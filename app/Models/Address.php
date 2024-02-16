<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'address';
    protected $fillable = ['fuserId', 'address','pincode'];
    public $timestamps=false;

    // public function user(){
    //     return $this->hasmany(User::class,'id','userId');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'fuserId', 'userId');
    }
    public function orders()
    {
        return $this->hasMany(Orders::class, 'addressId');
    }
}
