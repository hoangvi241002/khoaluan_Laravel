<?php

namespace App\Admin\Controllers;

use App\Models\MedicalDeviceType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Tree;

class MedicalDeviceTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Medical Device Type';
    public function index(Content $content)
    {
        $tree = new Tree(new MedicalDeviceType);

        return $content
            ->header('Medical Device Type')
            ->body($tree);
    }
    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(MedicalDeviceType::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('order', __('Order'));
        $show->field('created_at', __('Created_at'));
        $show->field('updated_at', __('Updated_at'));
        return $show;
    }
    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new MedicalDeviceType());
        $form->select('parent_id', __('Parent Category'))->options((new MedicalDeviceType())::selectOptions());
        $form->text('title', __('Title'));
        $form->textarea('description', __('Description'));
        $form->number('order', __('Order'))->default(1);
        return $form;
    }
}
