<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::all();

        foreach( $items as $item ){
            $item->formated_tags = implode(',',$item->tags->pluck('name')->toArray() );
        }

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
        
        $product = new Product();
        $product->name = $request->name;
        $product->image = '';
        $product->status = 1;
        //$product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();

        $product->tags()->attach( $request->tags );

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
        //
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
        $item       = Product::find($id);


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
       
        $product = Product::find($id);

        $product->name = $request->name;
        $product->image = '';
        $product->status = 1;
        $product->category_id = $request->category_id;
        $product->save();

        //xóa toàn bộ dữ liệu ở bảng trung gian -> product id hiện tại

        //DELETE FROM `product_tag` WHERE product_id = $id
        $product->tags()->detach();

        //thêm dữ liệu vào bảng trung gian
        
        /*
            $request->tags = [
                0 => 1,
                1 => 2,
            ];

            foreach( $request->tags as $tag ){
                //INSERT INTO `product_tag` ( product_id, tag_id ) VALUES ( $id , $tag )
            }
        */
        $product->tags()->attach( $request->tags );

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
        //
    }
}
