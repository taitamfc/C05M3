<?php
// app/Repositories/Eloquents/ProductRepository.php

namespace App\Repositories\Eloquents;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Models\Product;

/*
ProductRepository sẽ đảm nhận vai trò chính tương tác với Model,
*/

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        $items = Product::all();
        foreach( $items as $item ){
            $item->formated_tags = implode(',',$item->tags->pluck('name')->toArray() );
        }
        return $items;
    }

    public function store($request)
    {
        $product = new Product();
        $product->name = $request->name;
        
        $product->status = 1;
        //$product->description = $request->description;
        $product->category_id = $request->category_id;

    
        if ($request->hasFile('hinh_anh') ) {
            $file = $request->hinh_anh;
            //kiểm tra đuôi

            //lưu vào folder
            $filename = $file->store('','local');
            $product->image = $filename;
        }

        $product->save();
        //$product->tags()->attach( $request->tags );
    }

    public function update($request,$id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->image = '';
        $product->status = 1;
        $product->category_id = $request->category_id;
        $product->save();

        //xóa toàn bộ dữ liệu ở bảng trung gian -> product id hiện tại

        //DELETE FROM `product_tag` WHERE product_id = $id
        //$product->tags()->detach();

        //thêm dữ liệu vào bảng trung gian
        
        /*
            $request->tags = [
                0 => 1,
                1 => 2,
            ];

            foreach( $request->tags as $tag ){
                //INSERT INTO `product_tag` ( product_id, tag_id ) VALUES ( $id , $tag );
            }
        */
        $product->tags()->attach( $request->tags );
    }

    public function find($id){
        return Product::find($id);
    }

    public function destroy($id){
        return Product::delete($id);
    }

    public function findByCategory($category_id){
        return Product::where('category_id',$id)->get();
    }
}