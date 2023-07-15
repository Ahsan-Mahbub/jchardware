<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $request->input('product_name');
        $category_id = $request->input('category_id');

        if($category_id){
            $products = Product::query()
                ->active()
                ->where('product_name', 'LIKE', "%{$search}%")
                ->where('category_id', $category_id)
                ->paginate(15);
        }else{
            $products = Product::query()
                ->active()
                ->where('product_name', 'LIKE', "%{$search}%")
                ->paginate(15);
        }
        return view('frontend.file.product.search',compact('products'));
    }
}
