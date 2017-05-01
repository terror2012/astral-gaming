<?php

namespace App\Http\Controllers;

use App\Eloquent\blog_categories;
use App\Eloquent\blog_giveaway;
use App\Eloquent\blog_news;
use App\Eloquent\giveaway_code;
use App\Eloquent\Product_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    function add_new_index()
    {
        $blogCat = blog_categories::where('visible', '=', '1')->get();
        return view('add_blog_new')->with(compact('blogCat'));
    }


    function add_news(Request $r)
    {
        if($r->has('category')&&$r->has('title')&&$r->has('message')&&$r->hasFile('thumbnail')&&$r->file('thumbnail')->isValid()&&$r->has('tags'))
        {
            $news = new blog_news();
            $title = $r->get('title');
            $message = $r->get('message');
            $tags = $r->get('tags');
            Image::make($r->file('thumbnail'))->resize(500, 375)->save('images/blog/' . str_replace(' ', '-', strtolower($title)));
            $image = 'images/blog/' . str_replace(' ','-',strtolower($title));

            $news->title = $title;
            $news->message = $message;
            $news->tags = $tags;
            $news->thumbnail = $image;

            $user_name = Auth::user()->name;
            $user_id = Auth::user()->id;
            $news->author_name = $user_name;
            $news->author_id = $user_id;

            $news->category = $r->get('category');
            $news->category_id = blog_categories::where('name', '=', $r->get('category'))->first()->id;
            $news->save();

            return redirect('blog_posts');
        }
    }
    function add_giveaway_index()
    {
        $blogCat = blog_categories::where('visible', '=', '1')->get();
        return view('add_blog_giveaway')->with(compact('blogCat'));
    }
    function add_giveaway(Request $r)
    {
        if($r->has('game_name') && $r->has('game_id')&&$r->has('title')&&$r->has('message')&&$r->has('tags')&&$r->has('platform')&&$r->has('code')&&$r->hasFile('thumbnail'))
        {
            $title = $r->get('title');
            $message = $r->get('message');
            $tags = $r->get('tags');
            $platform = $r->get('platform');
            $code_inp = $r->get('code');
            $game_name = $r->get('game_name');
            $game_id = $r->get('game_id');
            $image = 'images/blog'.str_replace(' ', '-', strtolower($title));

            $blog = new blog_giveaway();
            $code = new giveaway_code();

            $code->game_id = $game_id;
            $code->game_name = $game_name;
            $code->game_code = $code_inp;
            $code->active = '1';
            $code->save();
            $code_id = giveaway_code::where('game_code', '=', $code_inp)->first()->id;
            Image::make($r->file('thumbnail'))->resize(500, 375)->save('images/blog/' . str_replace(' ', '-', strtolower($title)));

            $blog->name = $title;
            $blog->author_id = Auth::user()->id;
            $blog->author_name = Auth::user()->name;
            $blog->game_name = $game_name;
            $blog->game_product_id = $game_id;
            $blog->game_key_id = $code_id;
            $blog->platform = $platform;
            $blog->message = $message;
            $blog->thumbnail = $image;
            $blog->tags = $tags;
            $blog->save();

            return redirect('/blog_posts');


        }
    }
    function request_name(Request $r)
    {
        $prod = Product_list::find($r->get('game_id'));
        return $prod->product_name;
    }

    function blog_announcement_index()
    {
        return view('add_blog_announcement');
    }
    function blog_announcement(Request $r)
    {
        if($r->has('priority')&& $r->has('type')&&$r->has('title')&&$r->has('message')&&$r->hasFile('thumbnail')&&$r->file('thumbnail')->isValid()&&$r->has('tags'))
        {
            $news = new blog_news();
            $title = $r->get('title');
            $message = $r->get('message');
            $tags = $r->get('tags');
            $priority = $r->get('priority');
            $type = $r->get('type');
            Image::make($r->file('thumbnail'))->resize(500, 375)->save('images/blog/' . str_replace(' ', '-', strtolower($title)));
            $image = 'images/blog/' . str_replace(' ','-',strtolower($title));





            return redirect('blog_posts');
        }
    }
}
