<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['userId','addressId','address','pincode','status'];
    public $timestamps=false;
    
    public function user(){
        return $this->belongsTo(User::class,'userId');
    }
    public function Address(){
        return $this->belongsTo(Address::class,'addressId');
    }
    public function orderlist(){
        return $this->hasMany(OrderItems::class,'orderId','id');
    }
}
