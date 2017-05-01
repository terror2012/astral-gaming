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
                    <form role="form" enctype="multipart/form-data" method="POST" action="{{ url('/add_products') }}">
                        {{ csrf_field() }}
                        <div class="youplay-input">
                            <input id="product_name" type="text" name="product_name" placeholder="Product Name">

                        </div>
                        <div class="youplay-input">
                            <input id="SKU" type="number" name="SKU" placeholder="SKU">
                        </div>
                        <div class="youplay-input">
                            <img src="" height="240" width="240" id="image_preview" alt="Image Preview"/>
                        </div>
                        <div class="youplay-input">
                            <input id="main_photo" type="file" onchange="previewFile()" name="main_photo"/>
                        </div>
                            <select name="category">
                                <option value="1">Action</option>
                                <option value="2">Adventure</option>
                            </select> <br> </br>
                        <div class="youplay-input">
                            <textarea id="description" placeholder="Product Description" name="description"></textarea>
                        </div>
                        <div class="youplay-input">
                            <input id="trailer" type="text" name="trailer" placeholder="Youtube Trailer Link"/>
                        </div>
                        <div class="youplay-input">
                            <input id="gameplay" type="text" name="gameplay" placeholder="Youtube GamePlay Link"/>
                        </div>
                        <div class="youplay-input">
                            <input id="tags" type="text" name="tags" placeholder="Insert Product Tags"/>
                        </div>
                        <div class="youplay-input" id="images">
                            <input id="picture_1" name="picture_1" type="file"/>
                            <input id="picture_2" name="picture_2" type="file"/>
                            <input id="picture_3" name="picture_3" type="file"/>
                            <input id="picture_4" name="picture_4" type="file"/>
                        </div>
                            <input id="discountOn" type="checkbox" name="discountOn" value="0"/> Is Discount On? </br></br>
                            <input id="featureOn" type="checkbox" name="featureOn" value="0"/> Is Featured On?`</br>
                        <h2 class="container h1">System Requirments</h2>
                        <div class="youplay-input">
                            <input id="os" type="text" name="os" placeholder="OS"/>
                        </div>
                        <div class="youplay-input">
                            <input id="cpu" type="text" name="cpu" placeholder="CPU"/>
                        </div>
                        <div class="youplay-input">
                            <input id="memory" type="text" name="memory" placeholder="RAM"/>
                        </div>
                        <div class="youplay-input">
                            <input id="gpu" type="text" name="gpu" placeholder="GPU"/>
                        </div>
                        <div class="youplay-input">
                            <input id="directX" type="text" name="directX" placeholder="DirectX"/>
                        </div>
                        <div class="youplay-input">
                            <input id="network" type="text" name="network" placeholder="Network"/>
                        </div>
                        <div class="youplay-input">
                            <input id="hdd" type="text" name="hdd" placeholder="Required Space"/>
                        </div>
                        <div class="youplay-input">
                            <input id="sound-card" type="text" name="sound-card" placeholder="Sound Card"/>
                        </div>
                        <div class="youplay-input">
                            <input id="discount" type="number" name="discount" placeholder="Discount value"/>
                        </div>
                            <input id="isPercentage" type="checkbox" name="isPercentage"/> Is discount value in percentage? </br>
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
