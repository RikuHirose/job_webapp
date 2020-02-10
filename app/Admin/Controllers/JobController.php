<?php

namespace App\Admin\Controllers;

use App\Models\Job;
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

        $grid->column('id', __('Id'));
        $grid->column('bg_image_id', __('Bg image id'));
        $grid->column('company_id', __('Company id'));
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
        $show->field('bg_image_id', __('Bg image id'));
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

        $form->number('bg_image_id', __('Bg image id'));
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
}
