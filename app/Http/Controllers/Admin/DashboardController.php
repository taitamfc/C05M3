<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(){
        // Truyen du lieu sang view
        $params = [
            'total_orders'      => 100,
            'total_rates'       => 200,
            'total_users'       => 10,
            'total_visitors'    => 50,
        ];
        return view('admin.dashboard.dashboard',$params);
    }
}
