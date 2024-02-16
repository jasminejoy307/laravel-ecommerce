<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['name', 'categoryId','brandId','photo','price','status'];
    public $timestamps=false;

    public function Category(){
        return $this->belongsTo(Category::class,'categoryId','id');
    }
    public function Brands(){
        return $this->belongsTo(Brands::class,'brandId','id');
    }
    public function Cart(){
        return $this->belongsTo(Cart::class,'productId','id');
    }
}
