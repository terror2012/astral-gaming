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

<h2 class="container h1">Add Blog Giveaway</h2>
<section class="youplay-login">
    <div class="info">
        <div class="container align-center">
            <div class="">
                <form role="form" enctype="multipart/form-data" method="POST" action="{{ url('/add_blog_giveaway') }}">
                    {{ csrf_field() }}
                    <div class="youplay-input">
                        <input id="title" type="text" name="title" placeholder="Article Title">
                    </div>
                    <div class="youplay-input">
                        <textarea rows="4" name="message" id="message" placeholder="Article Body"></textarea>
                    </div>
                    <br>
                    <br>
                    <div class="youplay-input">
                        <input type="text" id="tags" name="tags" placeholder="Tags separated by ,"/>
                    </div>
                    <img src="" id="image_preview"/>
                    <br>
                    <input type="file" name="thumbnail" id="thumbnail" onchange="previewFile()"/>

                    <select id="platform" name="platform">
                        <option value="Steam">Steam</option>
                        <option value="uPlay">uPlay</option>
                        <option value="Origin">Origin</option>
                        <option value="DRM">DRM</option>
                    </select>

                    <div class="youplay-input">
                        <input type="text" name="code" id="code"/>
                    </div>
                    <div class="youplay-input">
                        <input type="text" name="game_name" id="game_name" placeholder="Game Name"/>
                    </div>
                    <div class="youplay-input">
                        <input type="text" name="game_id" id="game_id" placeholder="Game Product ID"/>
                    </div>
                        <input id="game_fill" class="btn btn-primary db" onclick="fill_game_name('{{url('/giveaway/request')}}', '{{csrf_token()}}')" value="AutoFill Game Name">


                    <button type="submit" class="btn btn-default db">Add news</button>
                </form>
            </div>
        </div>
    </div>

</section>

@include('layouts/admin_foot')

<script src="js/image_preview.js"></script>
<script src="{{'js/giveaway_game_add.js'}}"></script>

</html>
