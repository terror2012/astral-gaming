<!DOCTYPE html>
<!--
  Name: Youplay - Game Template based on Bootstrap
  Version: 3.1.1
  Author: nK
  Website: https://nkdev.info
  Support: https://nk.ticksy.com
  Purchase: http://themeforest.net/item/youplay-game-template-based-on-bootstrap/11306207?ref=_nK
  License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
  Copyright 2016.
-->
<html>

@include('layouts/admin_head')

<!--NavBar -->
@include('layouts/admin_navbar')

<section class="youplay-news container"></section>
@if (session()->has('flash_notification.message'))
    <div class="alert alert-{{session('flash_notification.level')}}" role="alert">
        <strong>Oh snap!</strong> {!! session('flash_notification.message') !!}
    </div>
@endif

<h2 class="container h1">Add Blog News</h2>
<section class="youplay-login">
    <div class="info">
        <div class="container align-center">
            <div class="">
                <form role="form" enctype="multipart/form-data" method="POST" action="{{ url('/add_blog_new') }}">
                    {{ csrf_field() }}
                    <div class="youplay-input">
                        <input id="title" type="text" name="title" placeholder="Article Title">
                    </div>
                    <div class="youplay-input">
                        <textarea rows="4" name="message" id="message" placeholder="Article Body"></textarea>
                    </div>
                    <select id="category" name="category">
                    @if(!empty($blogCat))
                        @foreach($blogCat as $b)

                        <option value="{{$b->name}}">{{$b->name}}</option>

                        @endforeach
                        @endif
                    </select>
                    <br>
                    <br>
                    <div class="youplay-input">
                        <input type="text" id="tags" name="tags" placeholder="Tags separated by ,"/>
                    </div>
                    <img src="" id="image_preview"/>
                    <br>
                    <input type="file" name="thumbnail" id="thumbnail" onchange="previewFile()"/>

                    <button type="submit" class="btn btn-default db">Add news</button>
                </form>
            </div>
        </div>
    </div>

</section>

@include('layouts/admin_foot')

<script src="js/image_preview.js"></script>

</html>
