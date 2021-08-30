<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Repositories\Eloquents\ProductRepository;

class CategoriesController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
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
        // Get all records
        $items = Category::all();
        
        $params = [
            'items' => $items
        ];
        return view('admin.categories.index',$params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Category::find(1); //has many tên mối quan hệ products
        //$products = Product::where('category_id',$id)->get();
        $products = $this->productRepository->findByCategory($id);
        $params = [
            'item'      => $item,
            'products'  => $products
        ];
        return view('admin.categories.index',$params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Category::find($id);
        // dd($item->toArray());   

        $params = [
            'item' => $item
        ];
        return view('admin.categories.edit',$params);
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
        //lấy giá trị đầu vào
        //dd( $request->all() );

        //validate    


        //lưu dữ liệu
        $item = Category::find($id);
        $item->name         = $request->name;
        $item->description  = $request->description;
        $item->save();

        //thông báo

        //chuyển hướng
        return redirect()->route('categories.index');
        //return redirect()->route('categories.edit',$id);
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
