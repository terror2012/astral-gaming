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

<section class="youplay-news container">
    <h2>Categories</h2>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Category Parent</th>
            <th>Description</th>
            <th>Visible</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @if(! empty($categories))
                @foreach($categories as $category)
                    <tr>
                    <th>{{$category->id}}</th>
                    <th>{{$category->name}}</th>
                    <th>{{$category->parent}}</th>
                    <th>{{$category->description}}</th>
                    <th>{{$category->visible}}</th>
                    <th><a href="{{url('/edit_category/' . $category->id)}}"><span class="glyphicon glyphicon-edit"></span></a><a href="{{url('/change_visibility/' . $category->id)}}"><span class="glyphicon @if($category->visible == "1") glyphicon-eye-close @else glyphicon-eye-open @endif "></span></a><a href="{{url('/delete_category/' . $category->id)}}"><span class="glyphicon glyphicon-remove-circle"></span></a></th>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</section>

<h2 class="container h1">Add New Category</h2>
<section class="youplay-login">
    <div class="info">
        <div>
            <div class="container align-center">
                <div class="">
                    <form role="form" enctype="multipart/form-data" method="POST" action="{{ url('/add_category') }}">
                        {{ csrf_field() }}
                        <div class="youplay-input">
                            <input id="name" type="text" name="name" placeholder="Category Name" value="">

                        </div>
                        <div class="youplay-input">
                            <input id="parent_name" type="text" name="parent_name" placeholder="Parent Name (if any)" value="">

                        </div>
                        <div class="youplay-input">
                            <textarea id="description" name="description" placeholder="Product Description"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default db">Save Settings</button>
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
          source: 'autocomplete',
        select:function(event, ui){
            $('#parent_name').val(ui.item.value);
            console.log(ui.item.value);
        }
        });
    });
</script>



</html>
