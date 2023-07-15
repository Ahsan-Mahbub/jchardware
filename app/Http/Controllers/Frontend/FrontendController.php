<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Category;
use App\Models\Product;

class FrontendController extends Controller
{
    public function product()
    {
        $products = Product::active()->orderBy('id','desc')->paginate(15);
        return view('frontend.file.product.product', compact('products'));
    }

    public function categoryProduct($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if($category){
            $products = Product::where('category_id', $category->id)->active()->orderBy('id','desc')->paginate(15);
            return view('frontend.file.product.category', compact('products','category'));
        }else{
            return redirect('/');
        }
    }

    public function singleProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $products = Product::where('category_id', $product->category_id)->where('id','!=',$product->id)->limit(4)->get();
        return view('frontend.file.product.single-product', compact('product','products'));
    }

    public function message(Request $request){
        $message = new Message();
        $requested_data = $request->all();
        $save = $message->fill($requested_data)->save();
        if($save){
            return back()->with('message','Enquire Message Send Successfully');
        }else{
            return back()->with('error','Enquire Message Send Failed!!');;
        }
    }
}
