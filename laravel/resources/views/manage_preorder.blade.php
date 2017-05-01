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
            <th>Pre-Order Name</th>
            <th>Background Image</th>
            <th>Release Date</th>
            <th>Price</th>
            <th>Main Page</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @if(! empty($preorder))
            @foreach($preorder as $p)
                <tr>
                    <th>{{$p['id']}}</th>
                    <th>{{$p['name']}}</th>
                    <th><img src="{{url($p['background'])}}" width="64" height="64"/></th>
                    <th>{{$p['release_at']}}</th>
                    <th>{{$p['price']}}</th>
                    <th>@if($p['featured'] == '1') Featured @else <a href="{{url('/set_featured/' . $p['id'])}}">Set as Featured</a> @endif</th>
                    <th><a href="{{url('/delete_preorder/' . $p['id'])}}"><span class="glyphicon glyphicon-remove-circle"></span></a></th>
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
