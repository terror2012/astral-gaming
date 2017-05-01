<?php

namespace App\Http\Controllers;

use App\Eloquent\pre_order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
class PreOrderController extends Controller
{
    function index()
    {
        return view('pre_order')->with('name', Auth::user()->name);
    }
    function submit()
    {
        if(Input::has('pre_name')&&Input::hasFile('background_photo')&&Input::has('release_date')&&Input::has('price'))
        {
            $name = Input::get('pre_name');
            $release = Carbon::createFromFormat('Y-m-d', Input::get('release_date'));
            if(!File::exists('images/pre_order'))
            {
                File::makeDirectory('images/pre_order', $mode=0777, true, true);
            }
            Image::make(Input::file('background_photo'))->resize(1920, 1080)->save('images/pre_order/' . $name . '.jpg');
            $photo = 'images/pre_order/' . $name . '.jpg';
            $price = Input::get('price');

            $pre_order = new pre_order();

            $pre_order->name = $name;
            $pre_order->released_at = $release;
            $pre_order->price = $price;
            $pre_order->background = $photo;
            $pre_order->timestamps;
            $pre_order->save();

            flash('Pre_Order added successful', 'success');
            return redirect('/manage_preorder');
        }
        flash('Pre_Order not added', 'danger');
        return redirect('/manage_preorder');
    }
    function manage()
    {
        $pre_order = pre_order::all();
        $preorderData=[];
        foreach($pre_order as $p)
        {
            if($p->expired == '0')
            {
                $present = Carbon::now()->toDateString();
                if($p->released_at < $present)
                {
                    $pre_orders = pre_order::find($p->id);
                    File::delete($pre_orders->background);
                    $pre_orders->delete();
                }
                else
                {
                    $preorderData[$p->id]['id'] = $p->id;
                    $preorderData[$p->id]['name'] = $p->name;
                    $released = Carbon::createFromFormat('Y-m-d H:i:s', $p->released_at)->toDateString();
                    $preorderData[$p->id]['release_at'] = $released;
                    $preorderData[$p->id]['background'] = $p->background;
                    $preorderData[$p->id]['price'] = $p->price;
                    $preorderData[$p->id]['featured'] = $p->featured;
                }
            }
        }
        return view('manage_preorder')->with('name', Auth::user()->name)->with('preorder', $preorderData);
    }

    function set_feature($id)
    {
        $pre_all_order = pre_order::where('featured', '=', '1')->get();
        foreach($pre_all_order as $p)
        {
            $p->featured = '0';
            $p->save();
        }
        $pre_order = pre_order::find($id);
        $pre_order->featured = '1';
        $pre_order->save();

        return redirect('/manage_preorder');
    }
    function delete($id)
    {
        $pre_order = pre_order::find($id);
        $pre_order->delete();

        return redirect('/manage_preorder');
    }
}
