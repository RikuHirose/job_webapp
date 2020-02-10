<?php

namespace App\Admin\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

use App\Admin\Controllers\Controller;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class JobController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Job';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Job());

        $grid->id('ID')->sortable();
        $grid->column('company_id', __('Company id'));

        $grid->cover_url(__('cover'))->display(function ($cover_url) {
            $url = config('filesystems.disks.s3.url').$cover_url;
            return "<img src='$url' width='50' height='50'>";
        });

        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('application_qualification', __('Application qualification'));
        $grid->column('salary_min', __('Salary min'));
        $grid->column('salary_max', __('Salary max'));
        $grid->column('office_time', __('Office time'));
        $grid->column('work_time', __('Work time'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('deleted_at', __('Deleted at'));

        $grid->actions(function ($actions) {
            // soft delete 済みのdata
            if (!is_null($this->row->deleted_at)) {
                $ref   = route('admin.jobs.restore');
                $jobId = $this->row->id;

                $actions->append('<div style="padding-top: 10px;display:inline-block;" target="_blank">
                              <form action="'.$ref.'" method="POST">
                                  <input type="hidden" name="job_id" value="'.$jobId.'">
                                  <input type="hidden" name="_token" value="'.csrf_token().'">
                                  <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-file-text"></i> <span style="font-size: 12px;">求人の復活</span></button>
                              </form>
                          </div>');
            }
        });

        $grid->filter(function ($filter) {
            // Range filter, call the model's `onlyTrashed` method to query the soft deleted data.
            $filter->scope('deleted_at', '削除済')->onlyTrashed();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Job::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('cover_url');
        $show->field('company_id', __('Company id'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('application_qualification', __('Application qualification'));
        $show->field('salary_min', __('Salary min'));
        $show->field('salary_max', __('Salary max'));
        $show->field('office_time', __('Office time'));
        $show->field('work_time', __('Work time'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Job());

        $companyIdOptions = $this->companyRepository->getIdOptions();

        $form->image('cover_url')->sequenceName()->rules(config('admin.upload.validation'))->help('画像は3MB以下にしてください');
        $form->select('company_id', 'company id')->options($companyIdOptions)->rules('required');

        $form->text('title', __('Title'));
        $form->textarea('description', __('Description'));
        $form->textarea('application_qualification', __('Application qualification'));
        $form->text('salary_min', __('Salary min'));
        $form->text('salary_max', __('Salary max'));

        $form->select('office_time', __('Office time'))->options(config('constants.job.office_time'));
        $form->select('work_time', __('Work time'))->options(config('constants.job.work_time'));

        return $form;
    }

    protected function restore(Request $request)
    {
        $job = $this->jobRepository->findWithTrashed($request->input('job_id'));
        $job->restore();

        return redirect()->back();
    }
}
