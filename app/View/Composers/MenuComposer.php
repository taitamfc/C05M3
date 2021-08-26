<?php
namespace App\View\Composers;
use Illuminate\View\View;

class MenuComposer{
	public function compose(View $view){
		//
        $menus = [
            [
                'id' => 1,
                'title' => 'Trang tổng quan',
                'link'  => '#',
                'icon'  => 'fa fa-dashboard',
                'name'  => 'dashboard',
            ],
            [
                'id' => 2,
                'title' => 'Quản lý sản phẩm',
                'link' => '#',
                'icon' => 'fa fa-th',
                'name'  => 'products.index',
            ],
            [
                'id' => 3,
                'title' => 'Quản lý danh mục',
                'link' => '#',
                'icon' => 'fa fa-pie-chart',
                'name'  => 'products.index',
            ]
        ];

        $view->with('menus', $menus);
    }
}