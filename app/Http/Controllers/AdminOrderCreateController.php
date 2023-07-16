<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderInformation;
use App\Models\Product;

class AdminOrderCreateController extends Controller
{
    public function index()
    {
        $all_order = OrderInformation::where('type', 'admin')->orderBy('id','desc')->get();
        return view('backend.file.order.admin-order',compact('all_order'));
    }

    public function create()
    {
        $products = Product::get();
        return view('backend.file.order.order-create', compact('products'));
    }

    public function getSearchProduct(Request $request){
        if ($request->searchDataLength >= 0) {
            $products = Product::where("product_name","LIKE","%".$request->search."%")
            ->orWhere('slug',"LIKE","%".$request->search."%")
            ->get();           
        }
        else {
            $products = Product::get();
        }
        return view('backend.file.order.search-product', compact('products'));
    }

    public function adminOrderGetProductDetails(Request $request){
        $productDetails = Product::where('id', $request->product_id)->select('product_name', 'price')->first();
        return response()->json($productDetails);
    }

}
