<?php

namespace App\Http\Controllers;

use App\Eloquent\General_settings;
use App\Eloquent\Product_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class GeneralSettingsController extends Controller
{
    public function index(Request $r) {

        $settings = General_settings::where('id', '=', '1')->first();
        if($settings !== null) {
            return view('general_settings')->with('name', Auth::user()->name)->with('settings', $settings);
        }
        if($settings === null) {
            return view('general_settings')->with('name', Auth::user()->name);
        }

    }
    public function postData(Request $r) {
        if($settingsPost = General_settings::where('id', '=', '1')->exists()) {
            $settings = General_settings::where('id', '=', '1')->first();
            if (Input::has('name')) {
                $settings->owner_name = Input::get('name');
            }
            if (Input::has('product_id')) {
                $products = Product_list::where('product_code', '=', Input::get('product_id'))->first();
                if ($products === null) {
                    flash('Product Code Not Found. Please check again');
                } else {
                    $settings->main_slider_name = $products->product_image_feature;
                    $settings->main_slider_path = "/products/" . $products->product_code;
                    $settings->main_slider_caption = "The Choice of Week Game";
                    $settings->main_product_name = $products->product_name;
                    $settings->main_slider_product_id = $products->product_code;
                }
            }
            if (Input::has('phone')) {
                $settings->phone = Input::get('phone');
            }
            if (Input::has('email')) {
                $settings->email = Input::get('email');
            }
            if (Input::has('long')) {
                $settings->long = Input::get('long');
            }
            if (Input::has('lat')) {
                $settings->lat = Input::get('lat');
            }
            if (Input::has('facebook')) {
                $settings->facebook = Input::get('facebook');
            }
            if (Input::has('twitter')) {
                $settings->twitter = Input::get('twitter');
            }
            if (Input::has('youtube')) {
                $settings->youtube = Input::get('youtube');
            }
            if (Input::has('twitch')) {
                $settings->twitch = Input::get('twitch');
            }
            if (Input::has('website_name')) {
                $settings->WebSite_Name = Input::get('website_name');
            }
            if (Input::hasFile('background_photo'))
            {
                Image::make(Input::file('background_photo'))->resize(1400, 513)->save('images/background.jpg');
                $settings->Bg_image = 'images/background.jpg';
            }
            $settings->save();
            return redirect()->route('general_settings');
        } else {
            $settings = new General_settings();
            if (Input::has('name')) {
                $settings->owner_name = Input::get('name');
            }
            if (Input::has('product_id')) {
                $products = Product_list::where('product_code', '=', Input::get('product_id'));
                if ($products === null) {
                    flash('Product Code Not Found. Please check again');
                } else {
                    $settings->main_slider_name = $products->product_image;
                    $settings->main_slider_path = "/products?id=" . $products->product_code;
                    $settings->main_slider_caption = "The Choice of Week Game";
                    $settings->main_product_id = $products->product_code;
                }
            }
            if (Input::has('phone')) {
                $settings->phone = Input::get('phone');
            }
            if (Input::has('email')) {
                $settings->email = Input::get('email');
            }
            if (Input::has('long')) {
                $settings->long = Input::get('long');
            }
            if (Input::has('lat')) {
                $settings->lat = Input::get('lat');
            }
            if (Input::has('facebook')) {
                $settings->facebook = Input::get('facebook');
            }
            if (Input::has('twitter')) {
                $settings->twitter = Input::get('twitter');
            }
            if (Input::has('youtube')) {
                $settings->youtube = Input::get('youtube');
            }
            if (Input::has('twitch')) {
                $settings->twitch = Input::get('twitch');
            }
            if (Input::has('website_name')) {
                $settings->WebSite_Name = Input::get('website_name');
            }
            $settings->save();
            return redirect()->route('general_settings');
        }
    }

}
