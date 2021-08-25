<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class ProductsController extends Controller{
	// public function index(){
	// 	dd( __METHOD__ );
	// }

	public function __construct(){
		$this->middleware('CheckAge');

		// $this->middleware(function ($request, $next) {
		// 	//return redirect()->route('home');
		// 	return $next($request);
		// });
	}

	public function __invoke(){

		dd( __METHOD__ );
	}
}