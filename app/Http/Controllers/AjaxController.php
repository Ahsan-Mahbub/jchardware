<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //  get product details
    public function getProductDetails(Request $request){
        $productDetails = Product::where('id', $request->product_id)->select('id', 'product_name', 'price')->first();
        return response()->json($productDetails);
    }

    //  get search product
    public function getSearchProduct(Request $request){
        if ($request->searchDataLength >= 0) {
            $products = Product::where("product_name","LIKE","%".$request->search."%")
            ->orWhere('slug',"LIKE","%".$request->search."%")
            ->get();           
        }
        else {
            $products = Product::get();
        }
        return view('backend.file.stock.search-product', compact('products'));
    }
}
