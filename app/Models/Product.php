<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name_product',
        'price',
        'img_path',
        'id_category'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'id_category','id');
    }

    public function order_details(){
        return $this->hasMany(Order_detail::class,'id_product','id');
    }

    public function getImgPath($value){
        return asset($value);
    }
}
