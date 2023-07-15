<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;

class HomeController extends Controller
{
    public function home()
    {
        $sliders = Slider::active()->get();
        $products = Product::where('feature',1)->active()->orderBy('id','desc')->get();
        $home_categories = Category::has('product')
            ->active()
            ->orderBy('id','desc')
            ->paginate(5)
            ->map(function( $category ){
                $category->product = $category->product->take(8);
            return $category;
        });
        $banner = Banner::first();
        return view('frontend.layouts.home', compact('sliders','products','home_categories','banner'));
    }
}
