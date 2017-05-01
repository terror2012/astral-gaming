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

<h2 class="container h1">Popular Products</h2>
<section class="youplay-news container">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>SKU</th>
            <th>Product Image</th>
            <th>Product Code</th>
            <th>Product Sales</th>
            <th>Discount Status</th>
            <th>Discount</th>
            <th>Price</th>
            <th>Total Price</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @if(!empty($featured_products))
                @foreach($featured_products as $product)
                    <th scope="row">{{$product->id}}</th>
                    <th>{{$product->product_name}}</th>
                    <th>{{$product->SKU}}</th>
                    <th>{{$product->picture_main}}</th>
                    <th>{{$product->product_code}}</th>
                    <th>0</th>
                    <th>@if($product->isDiscountOn == "1") Yes @elseif($product->isDiscountOn == "0") No @endif</th>
                    <th>${{$product->discountPrice}}</th>
                    <th>${{$product->price}}</th>
                    <th>$<?php echo $product->price - $product->discountPrice ?></th>
                @endforeach
            @endif

        </tr>
        </tbody>
    </table>
</section>



@include('layouts/admin_foot')

</html>
