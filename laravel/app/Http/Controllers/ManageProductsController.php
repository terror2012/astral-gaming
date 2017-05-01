<?php

namespace App\Http\Controllers;

use App\Eloquent\Product_list_detailed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageProductsController extends Controller
{
    public function index()
    {
        $prod = Product_list_detailed::all();
        return view('manage_products')->with(compact('prod'))->with('name', Auth::user()->name);
    }
    public function editProduct($id)
    {
        $prod = Product_list_detailed::find($id);
        $productInfo = [];
        $productInfo['id'] = $prod->id;
        $productInfo['name'] = $prod->product_name;
        //TODO finish the add product
        return view('edit_product')->with('name', Auth::user()->name);
    }
}
