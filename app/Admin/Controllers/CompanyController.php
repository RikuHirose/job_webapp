<?php

namespace App\Admin\Controllers;

use App\Models\Company;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CompanyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Company';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Company());

        $grid->column('id', __('Id'));
        $grid->column('logo_url', __('Logo image id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('description', __('Description'));
        $grid->column('address', __('Address'));
        $grid->column('founded_at', __('Founded at'));
        $grid->column('ceo_name', __('Ceo name'));
        $grid->column('staff_number_type', __('Staff number type'));
        $grid->column('website_url', __('Website url'));
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
        $show = new Show(Company::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('logo_url', __('Logo image id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('description', __('Description'));
        $show->field('address', __('Address'));
        $show->field('founded_at', __('Founded at'));
        $show->field('ceo_name', __('Ceo name'));
        $show->field('staff_number_type', __('Staff number type'));
        $show->field('website_url', __('Website url'));
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
        $form = new Form(new Company());

        $form->image('logo_url')->sequenceName()->rules(config('admin.upload.validation'))->help('画像は3MB以下にしてください');
        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->textarea('description', __('Description'));
        $form->textarea('address', __('Address'));
        $form->date('founded_at', __('Founded at'))->default(date('Y-m-d'));
        $form->text('ceo_name', __('Ceo name'));
        $form->number('staff_number_type', __('Staff number type'));
        $form->text('website_url', __('Website url'));

        // callback after save
        $form->saved(function (Form $form) {
            if(strpos($form->model()->logo_url, config('filesystems.disks.s3.url')) === false) {

              $form->model()->update([
                'logo_url' => config('filesystems.disks.s3.url').$form->model()->logo_url
              ]);
            }
        });

        return $form;
    }
}
