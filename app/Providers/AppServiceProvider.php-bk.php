<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $menus = [
            [
                'id' => 1,
                'title' => 'Trang tổng quan',
                'link'  => '#',
                'icon'  => 'fa fa-dashboard'
            ],
            [
                'id' => 2,
                'title' => 'Quản lý sản phẩm',
                'link' => '#',
                'icon' => 'fa fa-th',
            ],
            [
                'id' => 3,
                'title' => 'Quản lý danh mục',
                'link' => '#',
                'icon' => 'fa fa-pie-chart',
            ]
        ];

        View::share('menus',$menus);

    }
}
