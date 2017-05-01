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

<h2 class="container h1">Add Blog Announcement</h2>
<section class="youplay-login">
    <div class="info">
        <div class="container align-center">
            <div class="">
                <form role="form" enctype="multipart/form-data" method="POST" action="{{ url('/add_blog_announcement') }}">
                    {{ csrf_field() }}
                    <div class="youplay-input">
                        <input id="title" type="text" name="title" placeholder="Article Title">
                    </div>
                    <div class="youplay-input">
                        <textarea rows="4" name="message" id="message" placeholder="Article Body"></textarea>
                    </div>
                    <select id="priority" name="priority">
                                <option value="low">low</option>
                                <option value="medium">medium</option>
                                <option value="high">high</option>
                    </select>
                    <br>
                    <br>

                    <select id="type" name="type">
                        <option value="patch_update">Patch Update</option>
                        <option value="tech_issue">Technical Issue</option>
                        <option value="maintenance">Maintenance</option>
                        <option value="error">Active Error</option>
                        <option value="shop_status">Shop Status</option>
                        <option value="others">Others</option>
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
