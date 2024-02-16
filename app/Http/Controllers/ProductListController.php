<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Orders;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\{Cart, Products,User,Address};

class ProductListController extends Controller
{
    public function product_list()
    {
        $product=Products::with(['category','brands'])->get();
        return view('product.all_list',['products'=>$product]);
    }
    public function addtocart(Request $request)
    {
        if (!$request->cookie('cookieId'))
        {
            cookie('cookieId', uniqid(), time()+30*24*60*60);
        }
        if (auth()->check()) {
            Cart::where('cookieId',$request->cookie('cookieId'))
                ->where('userId', 0) 
                ->update(['userId' => auth()->user()->userId]);
        }
        $existingCartItem = Cart::where('productId', $request->product)
                            ->where('cookieId', $request->cookie('cookieId'))
                            ->where('userId', (auth()->check()) ? auth()->user()->userId : 0)
                            ->first();

        if ($existingCartItem) {
            $existingCartItem->qty += $request->qty;
            $existingCartItem->save();
            return true; 
        }
        else{
            $cart            = new Cart();
            $cart->productId = $request->product;
            $cart->userId    = (auth()->check())?auth()->user()->userId:0;
            $cart->cookieId  = $request->cookie('cookieId');
            $cart->qty       = $request->qty;
            $result          = $cart->save();
            return $result;
        }
    }

    public function checkout(Request $request){
        
        $address='';
        $cookieid = $request->cookie('cookieId');
        $cartItems = Cart::with(['Products','user'])->where('cookieId',$cookieid)->where('userId', (auth()->check()) ? auth()->user()->userId : 0)->get();
        if (Auth::check()) {
            $user = Auth::user()->userId;
            $address=Address::with(['user'])->where('fuserId',$user)->get();
        }
        return view('cart', ['cart'=> $cartItems,'addr'=>$address]);
    }
    
    public function checkoutaction(Request $request)
    {
        if(Auth::check()) {
        $request->validate([
            'addressId'     => 'required',
            'address'     => 'required',
            'pincode'     => 'required',
            'delivery_date'     => 'required',
        ]);
    }
    else{
        $request->validate([
            'address'     => 'required',
            'name'     => 'required',
            'email'     => 'required',
            'phone'     => 'required',
            'pincode'     => 'required',
            'delivery_date'     => 'required',
        ]);
    }
        try {
            DB::beginTransaction();
                $orderData = [
                                'userId'    => (auth()->check())?auth()->user()->userId:0,
                                'addressId' => $request->addressId,
                                'address'   => $request->address,
                                'pincode'   => $request->pincode,
                            ];
                $orderId   = Orders::insertGetId($orderData);
                
                $cookieid = $request->cookie('cookieId');
                $cartItems = Cart::with(['Products','user'])->where('cookieId',$cookieid)->where('userId', (auth()->check()) ? auth()->user()->userId : 0)->get();
                $orderItems = [];
                foreach ($cartItems as $key => $value) {
                    array_push($orderItems, ['orderId' => $orderId, 'productId' => $value->productId, 'qty' => $value->qty, 'price' => $value->Products->price]);
                    Cart::where('id', $value->id)->delete();
                }
                OrderItems::insert($orderItems);
            DB::commit();
            echo 'order placed';
        } 
        catch (\Exception $e) {
            DB::rollback();
            echo 'order not placed';
            dd($e);
        }
    }

}
