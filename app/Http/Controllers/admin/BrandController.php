<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Category;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand=Brands::get();
        return view('brand.list',['brands'=>$brand]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required'
        ]);
        $brand = new Brands();
        $brand->name   = $request->name;
        $result = $brand->save();
        if ($result) {
            return redirect(route('brand.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('brand.index'))->with('error', 'Failure');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brands=Brands::where('id',$id)->first();
         return view('brand.view',['brand'=>$brands]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brands=Brands::where('id',$id)->first();
         return view('brand.edit',['brand'=>$brands]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'     => 'required'
        ]);
       
        $brand =  Brands::findOrFail($id);
        $brand->name   = $request->name;
        $result = $brand->save();
        if ($result) {
            return redirect(route('brand.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('brand.index'))->with('error', 'Failure');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Brands::findOrFail($id)->delete(); 
        if ($result) {
            return redirect(route('brand.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('brand.index'))->with('error', 'Failure');
        }
    }
}
