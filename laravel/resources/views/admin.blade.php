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
<section class="youplay-news container">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Account Type</th>
            <th>Account Rank</th>
            <th># of Products</th>
            <th>Ammount Paid</th>
            <th>Comission Paid</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @if($orders)
                @foreach($orders as $order)
                    <th scope="row">{{$order->id}}</th>
                    <td>{{ $order->name }}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$type[$order->id]}}</td>
                    <td>{{$rank[$order->id]}}</td>
                    <td>{{$product_nr[$order->id]}}</td>
                    <td>${{$order->total_paid}}</td>
                    <td>${{$order->comission_paid}}</td>
                    <td>Actions</td>
                @endforeach
            @endif
        </tr>
        </tbody>
        </table>
</section>



@include('layouts/admin_foot')

</html>
