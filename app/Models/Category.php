<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Chon table de lam viec
    protected $table = 'categories';

    //chon khoa chinh cho bang
    protected $primaryKey = 'id';

    //du lieu tu dong chen vao created_at va updated_at
    public $timestamps = true;
    
}
