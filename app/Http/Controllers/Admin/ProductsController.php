<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Category;
use App\Models\Tag;

//use App\Repositories\Eloquents\ProductRepository;
use App\Repositories\Eloquents\ItemRepository;

class ProductsController extends Controller
{
    protected $productRepository;

    public function __construct(ItemRepository $productRepository)
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
        $this->productRepository->store($request);
        return redirect()->route('products.index');
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
        $this->productRepository->update($request,$id);
        return redirect()->route('products.index');

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
