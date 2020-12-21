<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

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
        return $this->belongsTo(Discount::class, 'id_discount', 'id');
    }

    public function order_details(){
        return $this->hasMany(Order_detail::class, 'id_order', 'id');
    }
}
