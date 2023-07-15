<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_stock = Stock::orderBy('id','desc')->get();
        return view('backend.file.stock.list', compact('all_stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        return view('backend.file.stock.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator  = $request->validate([
            'product_id'  => 'required',
            'quantity'  => 'required',
        ]);
        \DB::transaction(function () use( $request ) {
            $stock = new Stock();
            $formData = $request->all();
            $stock->fill($formData)->save();

            $product = Product::where('id', $request->product_id)->first();
            $product_stock_data = [
                'stock'   => $product->stock + $request->quantity,
            ];
            Product::where('id', $request->product_id)->update($product_stock_data);
        });
        return back()->with('message', 'Product Stock Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
