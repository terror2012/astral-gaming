<?php

namespace App\Http\Controllers;

use App\Eloquent\Product_list_detailed;
use App\Eloquent\reviews;
use App\Eloquent\User;
use App\Eloquent\User_Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    function index($id)
    {
        $AccRank = '';
        $AccName = '';
        if(Auth::check()) {
            $userSess = User_Info::where('email', '=', Auth::user()->email)->first();
            if($userSess !== null) {
                $AccRank = $userSess->AccountRank;
                $AccName = $userSess->name;
            }
            }

        $product_detailed = Product_list_detailed::where('id', '=', $id)->first();
        $productD = [];
        $productD['id'] = $product_detailed->id;
        $productD['name'] = $product_detailed->product_name;
        $productD['description'] = $product_detailed->product_description;
        $productD['pic_main'] = $product_detailed->picture_main;
        $pics = explode(',', $product_detailed->pictures);
        $productD['pics'] = $pics;
        $trailerPic = explode('=', $product_detailed->trailer);
        $productD['trailer_code'] = $trailerPic['1'];
        $productD['trailer'] = $product_detailed->trailer;
        $gameplayPic = explode('=', $product_detailed->gameplay);
        $productD['gameplay_code'] = $gameplayPic['1'];
        $productD['gameplay'] = $product_detailed->gameplay;
        $productD['isDiscOn'] = $product_detailed->isDiscountOn;
        $productD['discount'] = $product_detailed->discountPrice;
        $productD['percentage'] = $product_detailed->isPercentage;
        $productD['price'] = $product_detailed->price;
        $productD['os'] = $product_detailed->os;
        $productD['cpu'] = $product_detailed->cpu;
        $productD['memory'] = $product_detailed->memory;
        $productD['gpu'] = $product_detailed->gpu;
        $productD['directX'] = $product_detailed->directX;
        $productD['network'] = $product_detailed->network;
        $productD['hdd'] = $product_detailed->HDD;
        $productD['sound_card'] = $product_detailed->sound_card;
        $productD['review_count'] = reviews::count();
        $review = reviews::where('product_code', '=', $product_detailed->product_code)->get();
        $reviewData = [];
        foreach($review as $r)
        {
            $reviewData[$r->id]['id'] = $r->id;
            $reviewData[$r->id]['userID'] = $r->user_id;
            $reviewData[$r->id]['userName'] = User::find($r->user_id)->name;
            $reviewData[$r->id]['reviewRating'] = $r->review_stars;
            $reviewData[$r->id]['message'] = $r->message;
            $reviewData[$r->id]['postedAt'] = $r->created_at->diffForHumans();
        }
        return view('product')->with('review', $reviewData)->with('rank', $AccRank)->with('name', $AccName)->with('product', $productD);
    }
}
