<?php

namespace App\Admin\Controllers;

use App\Models\OrderDetail;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderDetailController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'OrderDetail';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrderDetail());

        $grid->column('id', __('Id'));
        $grid->column('order_id', __('Order id'));
        $grid->column('medical_device_id', __('Medical device id'));
        $grid->column('price', __('Price'));
        $grid->column('medical_device_details', __('Medical device details'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('tax_amount', __('Tax amount'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('test', __('Test'));

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
        $show = new Show(OrderDetail::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('order_id', __('Order id'));
        $show->field('medical_device_id', __('Medical device id'));
        $show->field('price', __('Price'));
        $show->field('medical_device_details', __('Medical device details'));
        $show->field('quantity', __('Quantity'));
        $show->field('tax_amount', __('Tax amount'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('test', __('Test'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OrderDetail());

        $form->number('order_id', __('Order id'));
        $form->number('medical_device_id', __('Medical device id'));
        $form->decimal('price', __('Price'));
        $form->textarea('medical_device_details', __('Medical device details'));
        $form->number('quantity', __('Quantity'));
        $form->decimal('tax_amount', __('Tax amount'));
        $form->number('test', __('Test'))->default(7);

        return $form;
    }
}
