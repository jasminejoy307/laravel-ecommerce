<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\{OrderItems,Products,User,Address};

class OrderListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        //$orders=OrderItems::with('Products','Orders.User','Orders.Address') ->get();
        $orders=Orders::with('Address','User')->get();
        return view('orders.list',['order'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $orders=OrderItems::with('Products','Orders.User','Orders.Address','Orders.Address','Orders.user.addresses')->where('orderId',$id) ->get();
        $orders = Orders::with(['orderlist' => function($q) use($id) {
                                    $q->with(['Products'])->where('orderId',$id);
                                },'Address','user'])->findOrFail($id);
        return view('orders.view',['order'=>$orders]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $orders=OrderItems::with('Products','Orders.User')->where('id',$id) ->first();
        return view('orders.edit',['order'=>$orders]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status'     => 'required'
        ]);
        $Orders = Orders::where('id',$id) ->first();
        $Orders->status   =  $request->status;

        $result = $Orders->save();
        if ($result) {
            return redirect(route('orders.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('orders.index'))->with('error', 'Failure');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Orders::findOrFail($id)->delete(); 
        OrderItems::where('orderId', $id)->delete();
        if ($result) {
            return redirect(route('orders.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('orders.index'))->with('error', 'Failure');
        }
    }
}
