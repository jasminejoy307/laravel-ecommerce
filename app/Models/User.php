<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = ['name', 'email','phone','password','status'];
    protected $primaryKey = 'userId';
    public $timestamps=false;
    
    // public function address(){
    //     return $this->hasMany(Address::class,'userId','id');
    // }

public function addresses()
{
    // model, foreign key, primary key
    return $this->hasMany(Address::class, 'fuserId', 'userId');
}
public function orders()
{
    return $this->hasMany(Orders::class,'userId');
}
public function orderlist()
{
    return $this->hasMany(OrderItems::class,'userId');
}
    
}
