<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_discount',
        'discount',
        'expires',
        'active'
    ];

    public function orders(){
        return $this->hasMany(Order_detail::class);
    }
}
