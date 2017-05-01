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

<h2 class="container h1">Latest Sales</h2>
<section class="youplay-login">
    <div class="info">
        <div>
            <div class="container align-center">
                <div class="">
            <form role="form" enctype="multipart/form-data" method="POST" action="{{ url('/general_settings') }}">
                {{ csrf_field() }}
                <div class="youplay-input">
                    <input id="name" type="text" name="name" placeholder="Owner Name" value="{{$settings->owner_name}}">

                </div>
                <div class="youplay-input">
                    <input id="product_id" type="number" name="product_id" placeholder="Main Slider Product ID" value="{{$settings->main_slider_product_id}}">

                </div>
                <div class="youplay-input">
                    <input id="phone" type="number" name="phone" placeholder="Phone Number" value="{{$settings->phone}}">
                </div>
                <div class="youplay-input">
                    <input id="email" type="email" name="email" placeholder="Owner Email" value="{{$settings->email}}">
                </div>
                <div class="youplay-input">
                    <input id="long" type="number" name="long" placeholder="Google Maps Longitude" value="{{$settings->long}}">
                </div>
                <div class="youplay-input">
                    <input id="lat" type="number" name="lat" placeholder="Google Maps Latitude" value="{{$settings->lat}}">
                </div>
                <div class="youplay-input">
                    <input id="facebook" type="text" name="facebook" placeholder="Facebook url" value="{{$settings->facebook}}">
                </div>
                <div class="youplay-input">
                    <input id="twitter" type="text" name="twitter" placeholder="Twitter url" value="{{$settings->twitter}}">
                </div>
                <div class="youplay-input">
                    <input id="youtube" type="text" name="youtube" placeholder="Youtube URL" value="{{$settings->youtube}}">
                </div>
                <div class="youplay-input">
                    <input id="twitch" type="text" name="twitch" placeholder="Twitch URL" value="{{$settings->twitch}}">
                </div>
                <div class="youplay-input">
                    <input id="website_name" type="text" name="website_name" placeholder="Website Name" value="{{$settings->WebSite_Name}}">
                </div>

                <div class="youplay-input">
                    <img src="@if(!empty($settings->Bg_image)) {{url($settings->Bg_image)}} @endif" height="240" width="240" id="image_preview" alt="Image Preview"/>
                </div>
                <div class="youplay-input">
                    <input id="background_photo" type="file" onchange="previewFile()" name="background_photo"/>
                </div>




                <button type="submit" class="btn btn-default db">Save Settings</button>
            </form>
                    </div>
                </div>
            </div>


</section>

<script src="js/image_preview.js"></script>


@include('layouts/admin_foot')

</html>
