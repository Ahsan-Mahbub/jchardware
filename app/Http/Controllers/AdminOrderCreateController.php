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
}
