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
<h2 class="container h1">Edit Category</h2>
<section class="youplay-login">

    @if (session()->has('flash_notification.message'))
        <div class="alert alert-{{session('flash_notification.level')}}" role="alert">
            <strong>Oh snap!</strong> {!! session('flash_notification.message') !!}
        </div>
    @endif

    <div class="info">
        <div>
            <div class="container align-center">
                <div class="">
                    <form role="form" enctype="multipart/form-data" method="POST" action="{{ url('/edit_category_edd/' . $category['id'])}}">
                        {{ csrf_field() }}
                        <div class="youplay-input">
                            <input id="name" type="text" name="name" placeholder="Category Name" value="{{$category['name']}}">

                        </div>
                        <div class="youplay-input">
                            <input id="parent_name" type="text" name="parent_name" placeholder="Parent Name (if any)" value="@if(! empty($category['parent'])) {{$category['parent']}} @endif">

                        </div>
                        <div class="youplay-input">
                            <textarea id="description" name="description" placeholder="Product Description">{{$category['description']}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-default db">Save Category</button>
                    </form>
                </div>
            </div>
        </div>


</section>


@include('layouts/admin_foot')

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script type="text/javascript">

    $(function(){
        $('#parent_name').autocomplete({
            source: '/autocomplete',
            select:function(event, ui){
                $('#parent_name').val(ui.item.value);
                console.log(ui.item.value);
            }
        });
    });
</script>

</html>
