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
        $data = $request->all();
        // dd($request->all());
        // $validator  = $request->validate([
        //     'product_id'  => 'required',
        //     'quantity'  => 'required',
        // ]);

        // for ($key=0; $key < count($data['product_id']); $key++) {
        //     $isStock = Stock::where('product_id', $data['product_id'][$key])->get()->count();
        //     if ($isStock > 0) {
        //         $stock = Stock::where('product_id', $data['product_id'][$key])->first();
        //         $stock->quantity =  $data['qty'][$key] + $stock->quantity;
        //     } else {
        //         $stock = new Stock;
        //         $stock->quantity = $data['qty'][$key];
        //     } 
        //     $stock->product_id = $data['product_id'][$key];         
        //     $stock->save();
        // }  
        // return redirect()->route('product-stock.index')->with('message', 'Product Stock inserted Successfully');

        DB::transaction(function () use( $data ) {
            // $stock = new Stock();
            // $formData = $request->all();
            // $stock->fill($formData)->save();

            for ($key=0; $key < count($data['product_id']); $key++) {
                $isStock = Stock::where('product_id', $data['product_id'][$key])->get()->count();
                if ($isStock > 0) {
                    $stock = Stock::where('product_id', $data['product_id'][$key])->first();
                    $stock->quantity =  $data['qty'][$key] + $stock->quantity;
                } else {
                    $stock = new Stock;
                    $stock->quantity = $data['qty'][$key];
                } 
                $stock->product_id = $data['product_id'][$key];         
                $stock->save();

                $product = Product::where('id', $data['product_id'][$key])->first();
                $product_stock_data = [
                    'stock'   => $product->stock + $data['qty'][$key],
                ];
                Product::where('id', $data['product_id'][$key])->update($product_stock_data);
            }              
        });
        return back()->with('message', 'Product Stock store Successfully');
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
