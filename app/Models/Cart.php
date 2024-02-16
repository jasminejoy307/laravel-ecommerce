<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = ['productId', 'userId','cookieId','qty'];
    public $timestamps=false;

    public function user(){
        return $this->belongsTo(User::class,'userId');
    }
    public function Products(){
        return $this->belongsTo(Products::class,'productId');
    }
}
