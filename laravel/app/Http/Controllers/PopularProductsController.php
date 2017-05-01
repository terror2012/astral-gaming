<?php

namespace App\Http\Controllers;

use App\Eloquent\Product_list_detailed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PopularProductsController extends Controller
{
    public function index()
    {
        $featured_products = Product_list_detailed::orderBy('rating', 'DESC')->take(5)->get();
        return view('popular_products')->with('name', Auth::user()->name)->with(compact('featured_products'));
    }
}
