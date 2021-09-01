<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

use App\Models\Tag;

class Product extends Model
{
    use HasFactory;

    public function category(){
        //return $this->belongsTo('User', 'local_key', 'parent_key');

        /*
        Tham số thứ 2 là khóa ngoại của bảng hiện tại
        Tham số thứ 3 là khóa chính của bảng tham chiếu
        */

        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags(){
        //return $this->belongsToMany('Role', 'user_roles', 'user_id', 'foo_id');

        /*
        The third argument is the foreign key name of the model on which you are defining the relationship, while the fourth argument is the foreign key name of the model that you are joining to

        Tham số thứ 3 là khóa ngoại tham chiếu tới bảng hiện tại
        Tham số thứ 4 là khóa ngoại tham chiếu tới bảng join
        */

        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    }
}
