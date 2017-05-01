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

<h2 class="container h1">Featured Products</h2>
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
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @if(! empty($featured_products))
                @foreach($featured_products as $product)
                    <th scope="row">{{$product->id}}</th>
                    <th>{{$product->product_name}}</th>
                    <th>{{$product->SKU}}</th>
                    <th>{{$product->picture_main}}</th>
                    <th>{{$product->product_code}}</th>
                    <th>0</th>
                    <th>@if($product->isDiscountOn == "1") Yes @elseif($product->isDiscountOn == "0") No @endif</th>
                    <th>{{$product->discountPrice}}</th>
                    <th>{{$product->price}}</th>
                    <th><?php echo $product->price - $product->discountPrice ?></th>
                    <th><a href="{{url('/featured_products/delete/' . $product->product_code)}}"><span class="glyphicon glyphicon-remove"></span></a></th>
                @endforeach
            @endif

        </tr>
        </tbody>
    </table>
</section>

<h2 class="container h1">Add New Featured Product</h2>

<section class="youplay-login">
    <div class="info">
        <div>
            <div class="container align-center">
                <div class="">
                    <form role="form" enctype="multipart/form-data" method="POST" action="{{ url('/featured_products') }}">
                        {{ csrf_field() }}
                        <div class="youplay-input">
                            <input id="product_code" type="text" name="product_code" placeholder="Enter the Product Code for Featured Product">
                            </div>


                                @if (session()->has('flash_notification.message'))
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <strong>Oh snap!</strong> {!! session('flash_notification.message') !!}
                                        </div>

                                @endif
                        <button type="submit" class="btn btn-default db">Add Product</button>
                    </form>
                </div>
            </div>
        </div>


</section>



@include('layouts/admin_foot')

</html>
