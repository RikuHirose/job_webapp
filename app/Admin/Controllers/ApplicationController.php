<?php

namespace App\Admin\Controllers;

use App\Models\Application;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ApplicationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Application';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Application());

        $grid->column('id', __('Id'));
        $grid->column('job_id', __('Job id'));
        $grid->column('user_id', __('User id'));
        $grid->column('company_id', __('Company id'));
        $grid->column('status', __('Status'));
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
        $show = new Show(Application::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('job_id', __('Job id'));
        $show->field('user_id', __('User id'));
        $show->field('company_id', __('Company id'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Application());

        $form->number('job_id', __('Job id'));
        $form->number('user_id', __('User id'));
        $form->number('company_id', __('Company id'));
        $form->number('status', __('Status'));

        return $form;
    }
}
