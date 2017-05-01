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

<h2 class="container h1">Latest Sales</h2>
<section class="youplay-login">
    <div class="info">
        <div class="container align-center">
            <div class="">
                <form role="form" enctype="multipart/form-data" method="POST" action="{{ url('/add_preorder') }}">
                    {{ csrf_field() }}
                    <div class="youplay-input">
                        <input id="pre_name" type="text" name="pre_name" placeholder="Pre_Order Name">
                    </div>
                    <div class="youplay-input">
                        <img src="" height="240" width="240" id="image_preview" alt="Image Preview"/>
                    </div>
                    <div class="youplay-input">
                        <input id="background_photo" type="file" onchange="previewFile()" name="background_photo"/>
                    </div>
                    <div class="youplay-input">
                        <input id="release_date" type="date" name="release_date"/>
                    </div>
                    <div class="youplay-input">
                        <input id="price" type="number" name="price" placeholder="Price"/>
                    </div>

                    <button type="submit" class="btn btn-default db">Add product</button>
                </form>
            </div>
        </div>
    </div>

</section>

@include('layouts/admin_foot')

<script src="js/image_preview.js"></script>

</html>
