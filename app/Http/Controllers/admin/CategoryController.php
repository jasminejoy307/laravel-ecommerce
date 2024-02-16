<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::get();
        return view('category.list',['category'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::get();
        return view('category.create',['category'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required'
        ]);
        $category = new category();
        $category->name   = $request->name;
        if($request->pcat!=''){
            $category->parentId   = $request->pcat;
        }
        else{
            $category->parentId   = '';
        }
        $result = $category->save();
        if ($result) {
            return redirect(route('category.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('category.index'))->with('error', 'Failure');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories=Category::where('id',$id)->first();
       // dd($categories['parentId']);
        $parent=Category::where('id',$categories['parentId'])->first();
       // dd($parent['name']);
        return view('category.view',['category'=>$categories,'parentcat'=>$parent]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Category::where('id',$id)->first();
         //$parent=Category::where('id',$categories['parentId'])->first();
         $lists=Category::get();
        return view('category.edit',['category'=>$categories,'list'=>$lists]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'     => 'required'
        ]);
        $category = Category::findOrFail($id);
        $category->name   = $request->name;
        if($request->pcat!=''){
            $category->parentId   = $request->pcat;
        }
        else{
            $category->parentId   = '';
        }
        $result = $category->save();
       
        if ($result) {
            return redirect(route('category.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('category.index'))->with('error', 'Failure');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Category::findOrFail($id)->delete(); 
        if ($result) {
            return redirect(route('category.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('category.index'))->with('error', 'Failure');
        }
    }
}
