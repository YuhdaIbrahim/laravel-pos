<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order_detail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'quantity',
        'id_order',
        'id_product',
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
