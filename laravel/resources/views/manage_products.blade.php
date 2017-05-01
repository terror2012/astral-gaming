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
<section>

</section>
<section class="youplay-news container">
    <h2>Products</h2>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Product Code</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>SKU</th>
            <th>Main Image</th>
            <th>Trailer</th>
            <th>Gameplay</th>
            <th>Tags</th>
            <th>DiscountPrice</th>
            <th>Price</th>
            <th>Sales</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if(! empty($prod))
            @foreach($prod as $p)
                <tr>
                    <th>{{$p->id}}</th>
                    <th>{{$p->product_code}}</th>
                    <th>{{$p->product_name}}</th>
                    <th>{{$p->category}}</th>
                    <th>{{mb_strimwidth($p->product_description, 0, 20, "...")}}</th>
                    <th>{{$p->SKU}}</th>
                    <th><img src="{{$p->picture_main}}" width="64" height="64"/></th>
                    <th>{{$p->trailer}}</th>
                    <th>{{$p->gameplay}}</th>
                    <th>{{$p->tags}}</th>
                    <th>@if($p->isDiscountOn == "1") {{$p->discountPrice}} @else No Discount @endif</th>
                    <th>{{$p->price}}</th>
                    <th>{{$p->sales}}</th>
                    <th><a href="{{url('/edit_product/' . $p->id)}}"><span class="glyphicon glyphicon-edit"></span></a><a href="{{url('/product_visibility/' . $p->id)}}"><span class="glyphicon @if($p->visible == "1") glyphicon-eye-close @else glyphicon-eye-open @endif "></span></a><a href="{{url('/delete_product/' . $p->id)}}"><span class="glyphicon glyphicon-remove-circle"></span></a></th>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</section>



@include('layouts/admin_foot')

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script type="text/javascript">

    $(function(){
        $('#parent_name').autocomplete({
            source: 'autocomplete',
            select:function(event, ui){
                $('#parent_name').val(ui.item.value);
                console.log(ui.item.value);
            }
        });
    });
</script>



</html>
