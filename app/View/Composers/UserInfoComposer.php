<?php
namespace App\View\Composers;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserInfoComposer{
	public function compose(View $view){
        $cr_user = Auth::user();
        $view->with('cr_user', $cr_user);
    }
}