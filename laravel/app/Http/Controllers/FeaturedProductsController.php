<?php

namespace App\Http\Controllers;

use App\Eloquent\Product_list_detailed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class FeaturedProductsController extends Controller
{
    public function index(Request $r)
    {
        $featured_products = Product_list_detailed::where('isFeaturedOn', '=', '1')->get();
        if($featured_products !== null)
        {

            return view('featured_products')->with('name', Auth::user()->name)->with(compact('featured_products'));
        } else
        {
            return view('featured_products')->with('name', Auth::user()->name);
        }
    }
    public function postindex()
    {
        if(Input::has('product_code'))
        {
            $featured = Product_list_detailed::where('product_code', '=', Input::get('product_code'))->first();
            if($featured == null)
            {
                $errorMessage = "Product Code Not Found. Please check the code";
                flash($errorMessage);
                return view('featured_products')->with('name', Auth::user()->name);
            }
            if($featured->isFeaturedOn == "1")
            {
                $errorMessage = "Product Already Featured. Please check the code";
                flash($errorMessage);
                return view('featured_products')->with('name', Auth::user()->name);
            }
            $featured->isFeaturedOn = "1";
            $featured->save();
            return view('featured_products')->with('name', Auth::user()->name);
        }
    }
    public function delete($id)
    {
        $product = Product_list_detailed::where('product_code', '=', $id)->first();
        $product->isFeaturedOn = "0";
        $product->save();
        return redirect()->route('featured');
    }
}
