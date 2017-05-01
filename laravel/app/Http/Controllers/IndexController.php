<?php

namespace App\Http\Controllers;

use App\Eloquent\General_settings;
use App\Eloquent\pre_order;
use App\Eloquent\Product_list;
use App\Eloquent\Product_list_detailed;
use App\Eloquent\User;
use App\Eloquent\User_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(Request $r) {
        $g_settings = General_settings::find('1')->first();
        $prods = Product_list::all();
        $popular = Product_list::orderBy('rating', 'DESC')->get();
        $featured = Product_list_detailed::where('isFeaturedOn', '=', '1')->get();
        $preorder = pre_order::where('featured', '=', '1')
            ->where('expired', '=', '0')
            ->first();
        $preorderData['id'] = $preorder->id;
        $preorderData['name'] = $preorder->name;
        $preorderData['background'] = $preorder->background;
        $preorderData['released'] = $preorder->released_at;
        if(Auth::check()) {
            $userSess = User_Info::where('email', '=', Auth::user()->email)->first();
            if($userSess !== null) {
                $AccRank = $userSess->AccountRank;
                $AccName = $userSess->name;
                return view('main')->with('preorder', $preorderData)->with(compact('featured'))->with(compact('popular'))->with('products', $prods)->with('rank', $AccRank)->with('name', $AccName)->with('general', $g_settings);
            }
        }


        return view('main')->with('preorder', $preorderData)->with(compact('popular'))->with('general', $g_settings)->with('products', $prods)->with(compact('featured'));
    }
}
