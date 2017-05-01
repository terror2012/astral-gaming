<?php

namespace App\Http\Controllers;

use App\Eloquent\order_detailed;
use App\Eloquent\Order_history;
use App\Eloquent\Product_list;
use App\Eloquent\Product_list_detailed;
use App\Eloquent\reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    function add(Request $r, $id)
    {
        if($r->has('message')&&$r->has('review-rate'))
        {
            if(order_detailed::where('email', '=', Auth::user()->email)->where('product_code', '=', Product_list::find($id)->product_code) != null)
            {
                $product = Product_list::where('id', '=', $id)->first()->sku;
                $message = $r->get('message');
                $stars = $r->get('review-rate');

                $review = new reviews();
                $review->user_id = Auth::user()->id;
                $review->product_code = $product->product_code;
                $review->review_star = $stars;
                $review->invoice_id = order_detailed::where('email', '=', Auth::user()->email)->order_id;
                $review->message = $message;
                $review->timestamps;
                $review->save();


                $this->sum_reviews($product->SKU);
            }

        }
        flash('Review for Product #' . $id . ' Not Added, please check if all fields are completed', 'danger');
        return redirect('/products/' . $id);
    }

    private function sum_reviews($sku)
    {
        $reviews = reviews::where('user_id', '=', Auth::user()->id)->get();
        $reviewsAmm = [];
        foreach($reviews as $r)
        {
            array_push($reviewsAmm, $r->review_stars);
        }
        $review_t = array_sum($reviewsAmm) / 2;
        $review_f = floor($review_t);
        $review_r = $review_t - $review_f;
        if($review_r >= 0.5)
        {
                $half = true;
        }
        else
        {
            $half = false;
        }

            $product = Product_list::where('SKU', '=', $sku);
        $product_detail = Product_list_detailed::where('product_code', '=', $sku);
        if($half = true)
        {
            $product->review = $review_f + 0.5;
            $product_detail->review = $review_f + 0.5;
            $product->save();
            $product_detail->save();
        }
        else
        {
            $product->review = $review_f;
            $product->save();
            $product_detail->review = $review_f;
            $product_detail->save();
        }
    }
}
