<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Category;
use App\Models\Tag;

//use App\Repositories\Eloquents\ProductRepository;
//use App\Repositories\Eloquents\ItemRepository;

use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductsController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->productRepository->all();
        $params = [
            'items' => $items
        ];
        return view('admin.products.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags       = Tag::all();
        $categories = $categories->pluck('name','id')->toArray();
        $tags       = $tags->pluck('name','id')->toArray();
        $params = [
            'categories'    => $categories,
            'tags'          => $tags
        ];
        return view('admin.products.create',$params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roles = [
            'name' => 'required|max:255|unique:products'
        ];
        $messages = [
            'required'  => 'Vui lòng nhập vào trường này',
            'max'       => 'Vui lòng nhập dưới 255 ký tự',
        ];
        //$request->validate($roles,$messages);//tu dong chuyen huong ve cai trang create

        $validator = Validator::make($request->all(), $roles,  $messages);

        if( $validator->fails() ){
            //chuyen huong ve trang post len , va hien thi loi
            //withErrors: luu vao session loi

            return redirect()->route('products.create')->withErrors( $validator )->withInput(); 
        }

        //xu ly thanh cong


        $this->productRepository->store($request);
        //$_SESSION['success'] = 'Lưu thành công !';
        return redirect()->route('products.index')->with('success','Lưu thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->productRepository->find($id);
        $params = [
            'item'              => $item
        ];
        return view('admin.products.show',$params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags       = Tag::all();
        $item = $this->productRepository->find($id);

        $categories = $categories->pluck('name','id')->toArray();
        $tags       = $tags->pluck('name','id')->toArray();
        $selected_tags = $item->tags->pluck('id')->toArray();

        $params = [
            'categories'        => $categories,
            'tags'              => $tags,
            'item'              => $item,
            'selected_tags'     => $selected_tags
        ];
        return view('admin.products.edit',$params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roles = [
            'name' => 'required|max:255'
        ];
        $messages = [
            'required'  => 'Vui lòng nhập vào trường này',
            'max'       => 'Vui lòng nhập dưới 255 ký tự',
        ];
        $validator = Validator::make($request->all(), $roles,  $messages);

        if( $validator->fails() ){
            //chuyen huong ve trang post len , va hien thi loi
            //withErrors: luu vao session loi

            return redirect()->route('products.create')->withErrors( $validator )->withInput(); 
        }
        
        $this->productRepository->update($request,$id);
        return redirect()->route('products.index')->with('success','Lưu thành công !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->destroy($request,$id);
        return redirect()->route('products.index');
    }
}
