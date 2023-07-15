<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use File;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_product = Product::orderBy('id','desc')->get();
        return view('backend.file.product.list', compact('all_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.file.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new product();
        $requested_data = $request->all();
        $product->main_price = $request->price - $request->discount;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
        if ($request->hasFile('image2')) {
            $extension = $request->file('image2')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image2')->move($path, $name);
            $requested_data['image2'] = $path . $name;
        }
        if ($request->hasFile('image3')) {
            $extension = $request->file('image3')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image3')->move($path, $name);
            $requested_data['image3'] = $path . $name;
        }
        if ($request->hasFile('image4')) {
            $extension = $request->file('image4')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image4')->move($path, $name);
            $requested_data['image4'] = $path . $name;
        }
        $save = $product->fill($requested_data)->save();
        if($request->stock > 0)
        {
            $stock_data = [
                'product_id'   => $product->id,
                'quantity'  => $request->stock,
            ];
            Stock::insert($stock_data);
        }
        
        if($save){
            return redirect()->route('product.index')->with('message','Product Added Successfully');
        }else{
            return back()->with('error','Product Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    public function status($id)
    {
        $status = Product::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
        } else {
            $status->status = 0;
        }
        $status->save();
        return redirect()->back()->with('message','Product Status Change Successfully');
    }

    public function feature($id)
    {
        $feature = Product::findOrFail($id);
        if ($feature->feature == 0) {
            $feature->feature = 1;
        } else {
            $feature->feature = 0;
        }
        $feature->save();
        return redirect()->back()->with('message','Product Feature Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.file.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Product::findOrFail($id);
        $formData = $request->all();
        $update->main_price = $request->price - $request->discount; 
        if ($request->hasFile('image')) {
            if (File::exists($update->image)) {
                File::delete($update->image);
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }
        if ($request->hasFile('image2')) {
            if (File::exists($update->image2)) {
                File::delete($update->image2);
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image2')->move($path, $name);
            $formData['image2'] = $path . $name;
        }
        if ($request->hasFile('image3')) {
            if (File::exists($update->image3)) {
                File::delete($update->image3);
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image3')->move($path, $name);
            $formData['image3'] = $path . $name;
        }
        if ($request->hasFile('image4')) {
            if (File::exists($update->image4)) {
                File::delete($update->image4);
            }
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "backend/assets/images/product/";
            $request->file('image4')->move($path, $name);
            $formData['image4'] = $path . $name;
        }
        $updated = $update->fill($formData)->save();

        if($updated){
            return redirect()->route('product.index')->with('message','Product Updated Successfully');
        }else{
            return back()->with('error','Product Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Product Successfully Deleted');
    }
}
