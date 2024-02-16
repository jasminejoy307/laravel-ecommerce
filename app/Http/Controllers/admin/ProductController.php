<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Products,Category,Brands};

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $products=Products::with(['category','brands'])->orderBy('name','ASC')->paginate(10);
       return view('product.list',['product'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $category = Category::get();
        $brands = Brands::get();
        return view('product.create',['category'=>$category,'brand'=>$brands]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'category'  => 'required',
            'brand'     => 'required',
            'price'    => 'required',
           'filename' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $product = new Products();
        $product->name   = $request->name;
        $product->categoryId  = $request->category;
        $product->brandId   = $request->brand;
        $product->price = $request->price;

        $imageName = time().'.'.$request->filename->extension();
        $request->filename->move(public_path('uploads'), $imageName);

        $product->photo   = $imageName;
        $product->status   = 'Active';
        $result = $product->save();
        if ($result) {
            return redirect(route('product.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('product.index'))->with('error', 'Failure');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products=Products::with(['category','brands'])->where('id',$id)->first();
        return view('product.view',['product'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products=Products::with(['category','brands'])->where('id',$id)->first();
        $category = Category::get();
        $brands = Brands::get();
        return view('product.edit',['product'=>$products,'categorys'=>$category,'brand'=>$brands]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'     => 'required',
            'category'  => 'required',
            'brand'    => 'required',
            'price'     => 'required',
            'filename' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $product = Products::findOrFail($id);
        $product->name   = $request->name;
        $product->categoryId  = $request->category;
        $product->brandId = $request->brand;
        $product->price = $request->price;

        if ($request->hasFile('filename')) {
            $oldimg = $product->image;
            if($oldimg!='' && file_exists(public_path('uploads').'/'.$oldimg)) {
                unlink(public_path('uploads').'/'.$oldimg);
            }
            $imageName = time().'.'.$request->filename->extension();
            $request->filename->move(public_path('uploads'), $imageName);
            $product->photo = $imageName;
        }
        $result = $product->save();
        if ($result) {
            return redirect(route('product.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('product.index'))->with('error', 'Failure');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = Products::findOrFail($id)->delete(); 
        if ($result) {
            return redirect(route('product.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('product.index'))->with('error', 'Failure');
        }
    }

    
}
