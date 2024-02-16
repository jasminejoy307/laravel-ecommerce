<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = ['orderId', 'productId','qty','price'];
    public $timestamps=true;
    
    public function Products(){
        return $this->belongsTo(Products::class,'productId','id');
    }
    public function Orders(){
        return $this->belongsTo(Orders::class,'orderId','id');
    }
    public function User(){
        return $this->belongsTo(User::class,'userId');
    }
    
}
