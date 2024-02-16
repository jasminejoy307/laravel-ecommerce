<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = ['name'];
    public $timestamps=false;

    // public function Category(){
    //     return $this->belongsTo(Category::class,'categoryId','id');
    // }
    public function Products(){
        return $this->hasmany(Products::class,'brandId','id');
    }
}
