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
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags(){
        //return $this->belongsToMany('Role', 'user_roles', 'user_id', 'foo_id');
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id');
    }
}
