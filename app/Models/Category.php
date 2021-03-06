<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name_category'
    ];

    public function products(){
        return $this->hasMany(Product::class,'id_category','id');
    }

    public function detail_orders(){
        return $this->hasManyThrough(Order_detail::class,Product::class , 'id', 'id_product');
    }
}
