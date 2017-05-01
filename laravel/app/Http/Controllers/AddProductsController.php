<?php

namespace App\Http\Controllers;

use App\Eloquent\Product_list;
use App\Eloquent\Product_list_detailed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class AddProductsController extends Controller
{
    public function index(Request $r)
    {
        return view('add_products')->with('name', Auth::user()->name);
    }
    public function postindex(Request $r)
    {
        $name = Input::get('product_name');
        $sku = Input::get('SKU');
        $file = Input::file('main_photo');
        $category = Input::get('category');
        $description = Input::get('description');
        $trailer = Input::get('trailer');
        $gameplay = Input::get('gameplay');
        $tags = Input::get('tags');
        if (Input::has('discountOn'))
        {
            $discountOn = "1";
        } else
        {
            $discountOn = "0";
        }if (Input::has('featureOn'))
        {
            $featureOn = "1";
        } else
        {
            $featureOn = "0";
        }
        $os = Input::get('os');
        $cpu = Input::get('cpu');
        $memory = Input::get('memory');
        $gpu = Input::get('gpu');
        $directX = Input::get('directX');
        $network = Input::get('network');
        $hdd = Input::get('hdd');
        $sound_card = Input::get('sound-card');
        $discount = Input::get('discount');
        if (Input::has('isPercentage'))
        {
            $isPercentage = "1";
        } else
        {
            $isPercentage = "0";
        }
        $price = Input::get('price');

        if(Input::has('product_name') && Input::has('SKU') && Input::hasFile('main_photo') && Input::has('category') && Input::has('description') && Input::has('tags') && Input::has('price'))
        {
            if($this->checkSKU($sku) === true)
            {
                if($discountOn == "1" && !Input::has('discount'))
                {
                    flash('Discount set to On, but no Discount Price', 'danger');
                    return view('add_products')->with('name', Auth::user()->name);
                }

                Image::make($file)->resize(500, 375)->save('images/products/' . $sku . '-500x375.jpg');
                Image::make($file)->resize(1400, 645)->save('images/products/' . $sku . '-1400x645.jpg');
                Image::make($file)->resize(1920, 1080)->save('images/products/' . $sku . '-1920x1080.jpg');

                if(Input::hasfile('picture_1'))
                {
                    Image::make(Input::file('picture_1'))->resize(1920, 1080)->save('images/products/' . $sku . '-1920x1080_1.jpg');
                }
                if(Input::hasfile('picture_2'))
                {
                    Image::make(Input::file('picture_2'))->resize(1920, 1080)->save('images/products/' . $sku . '-1920x1080_2.jpg');
                }
                if(Input::hasfile('picture_3'))
                {
                    Image::make(Input::file('picture_3'))->resize(1920, 1080)->save('images/products/' . $sku . '-1920x1080_3.jpg');
                }
                if(Input::hasfile('picture_4'))
                {
                    Image::make(Input::file('picture_4'))->resize(1920, 1080)->save('images/products/' . $sku . '-1920x1080_4.jpg');
                }

                $product_detailed = new Product_list_detailed();
                $product_list = new Product_list();


                $random_number = $this->randomCode();
                //Product List Normal
                $product_list->product_name = e($name);
                $product_list->SKU = e($sku);
                $product_list->product_code = e($random_number);
                $product_list->product_image = e('images/products/' . $sku . '-500x375.jpg');
                $product_list->product_image_feature = e('images/products/' . $sku . '-1400x645.jpg');
                $product_list->category = e($category);
                $product_list->tags = e($tags);
                $product_list->price = e($price);
                $product_list->isDiscountOn = e($discountOn);
                $product_list->discountPrice = e($discount);
                $product_list->isFeaturedOn = e($featureOn);
                $product_list->isPercentage = e($isPercentage);
                $product_list->save();


                //Product Detailed List
                $photos = $this->getPictures($sku);
                $pictures = implode(',', $photos);
                $product_detailed->product_name = e($name);
                $product_detailed->SKU = e($sku);
                $product_detailed->product_description = e($description);
                $product_detailed->product_code = e($random_number);
                $product_detailed->picture_main = e('images/products/' . $sku . '-1920x1080.jpg');
                $product_detailed->pictures = e($pictures);
                $product_detailed->trailer = e($trailer);
                $product_detailed->gameplay = e($gameplay);
                $product_detailed->category = e($category);
                $product_detailed->tags = e($tags);
                $product_detailed->ratings = e("0");
                $product_detailed->price = e($price);
                $product_detailed->isDiscountOn = e($discountOn);
                $product_detailed->discountPrice = e($discount);
                $product_detailed->isFeaturedOn = e($featureOn);
                $product_detailed->isPercentage = e($isPercentage);
                $product_detailed->os = $os;
                $product_detailed->cpu = $cpu;
                $product_detailed->memory = $memory;
                $product_detailed->gpu = $gpu;
                $product_detailed->directX = $directX;
                $product_detailed->network = $network;
                $product_detailed->HDD = $hdd;
                $product_detailed->sound_card = $sound_card;
                $product_detailed->save();

                flash('Product Added Successfull', 'success');

                return view('add_products')->with('name', Auth::user()->name);
            } else
            {
                flash('Duplicate SKU', 'danger');
                return view('add_products')->with('name', Auth::user()->name);
            }
        }

    }
    function checkSKU($sku)
    {
        $product = Product_list::where('SKU', '=', $sku)->first();
        if($product === null)
        {
            return true;
        } else
        {
            return false;
        }
    }

    function randomCode()
    {
        $code = rand();
        $product = Product_list::where('product_code', '=', $code)->first();
        while($product !== null)
        {
            $code = rand();
            $product = Product_list::where('product_code', '=', $code)->first();
        }
        return $code;
    }
    function getPictures($sku)
    {
        $photos = [];
        if (Input::hasfile('picture_1'))
        {
            array_push($photos, $sku . '-1920x1080_1.jpg');
        }
        if(Input::hasfile('picture_2'))
        {
            array_push($photos, $sku . '-1920x1080_2.jpg');
        }
        if(Input::hasfile('picture_3'))
        {
            array_push($photos, $sku . '-1920x1080_3.jpg');
        }
        if(Input::hasfile('picture_4'))
        {
            array_push($photos, $sku . '-1920x1080_4.jpg');
        }
        return $photos;
    }
}
