<?php

namespace App\Http\Controllers;

use App\Eloquent\Order_history;
use App\Eloquent\User_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct() {
        if(Auth::guest()) {
            return redirect()->route('home');
        } elseif(Auth::check()) {
            $userinfo = User_Info::where('email', '=', Auth::user()->email)->first();
            if($userinfo->AccountRank !== "1")
            {
                return redirect()->route('home');
            }
        }
        //TODO remove the stuff above and do a middleware for both Admins and Moderators
        //TODO also, add the middleware to all pages
        //TODO Do a full cleanup of adminPanel, change the tags to normal ones.
    }
    public function index(Request $r)
    {
        $user_rank = [];
        $user_type = [];
        $prod_nr = [];
        $orders = Order_history::orderBy('id', 'desc')->take(10)->get();
        foreach($orders as $order) {
            $userinfo = User_Info::where('email', '=', $order->email)->first();
            $user_rank[$order->id] = $userinfo->AccountRank;
            $user_type[$order->id] = $userinfo->AccountType;
            $prod_array = explode(',', $order->products_code);
            $prod_nr[$order->id] = count($prod_array);
            return view('admin')->with('name', Auth::user()->name)->with(compact('orders'))->with('rank', $user_rank)->with('type', $user_type)->with('product_nr', $prod_nr);
        }

    }
}
