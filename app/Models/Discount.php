<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory;
    use SoftDeletes;

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
