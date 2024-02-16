<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderItems;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    { 
        $id = Auth::user()->userId;
        $order = Orders::with('orderlist.Products')->where('userId', $id)->get();
        return view('profile',['orders'=>$order]);
    }
}
