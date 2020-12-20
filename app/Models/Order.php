<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'total',
        'id_discount'
    ];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function discount(){
        return $this->belongsTo(Discount::class);
    }

    public function order_details(){
        return $this->hasMany(Order_detail::class);
    }
}
