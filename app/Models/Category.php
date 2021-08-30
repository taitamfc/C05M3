<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    // Chon table de lam viec
    protected $table = 'categories';

    //chon khoa chinh cho bang
    protected $primaryKey = 'id';

    //du lieu tu dong chen vao created_at va updated_at
    public $timestamps = true;

    /*
        category 1 -> get_products
    */


    public function get_products(){
        //khai báo mối quan hệ một category có nhiều sản phẩm
        //$this->hasMany( 'Product', 'foregin_key','local_key' )

        /*
        calling_table: Product
        foregin_key of calling_table: category_id
        local key: id

        Tên controller: CategoriesController
        Tên model: Category
        Khóa chính: id
        Khóa ngoại từ bảng khác tham chiếu tới bảng này luôn có tên là:category_id

    
        categories => Category
        category_id 

        users => User
        user_id

        */
        //return $this->hasMany(Product::class, 'category_id', 'id');
        return $this->hasMany(Product::class);
        
    }
    
}
