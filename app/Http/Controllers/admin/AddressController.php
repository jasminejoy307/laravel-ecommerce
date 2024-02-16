<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Address, User};

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $address=Address::with(['user'])->get();
        return view('address.list',['addr'=>$address]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $users = User::get();
        return view('address.create',['user'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address'     => 'required',
            'user'  => 'required',
            'pincode'     => 'required'
        ]);
        $address = new Address();
        $address->fuserId   = $request->user;
        $address->address  = $request->address;
        $address->pincode   = $request->pincode;
        $result = $address->save();
        if ($result) {
            return redirect(route('address.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('address.index'))->with('error', 'Failure');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $address=Address::with(['user'])->where('id',$id)->first();
        return view('address.view',['addr'=>$address]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $address=Address::with(['user'])->where('id',$id)->first();
        $users = User::get();
        return view('address.edit',['addr'=>$address,'user'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'address'     => 'required',
            'user'  => 'required',
            'pincode'    => 'required'
        ]);
        $address = Address::findOrFail($id);
        $address->address   = $request->address;
        $address->userId  = $request->user;
        $address->pincode = $request->pincode;
   
        $result = $address->save();
        if ($result) {
            return redirect(route('address.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('address.index'))->with('error', 'Failure');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Address::findOrFail($id)->delete(); 
        if ($result) {
            return redirect(route('address.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('address.index'))->with('error', 'Failure');
        }
    }
}
