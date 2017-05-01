<?php

namespace App\Http\Controllers;

use App\Eloquent\category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AddCategoryController extends Controller
{
    public function index()
    {
        $categories = category::all();

        return view('category')->with('name', Auth::user()->name)->with(compact('categories'));
    }
    public function postCategory(Request $r)
    {
        if (Input::has('name') && Input::has('description'))
        {
            $name = Input::get('name');
            $description = Input::get('description');
            $category = new category();

            //Sending data to database, using mysql injection protection
            $category->name = e($name);
            $category->description = e($description);
            $category->visible = e('1');
            if(Input::has('parent_name'))
            {
                $category->parent = e(Input::get('parent_name'));
            }
            $category->save();
            flash('Category added successful', 'success');
            return redirect()->route('category');
        }
    }
    public function editindex($id)
    {
        $categ = category::find($id)->first();
        $categoryData = [];


        return view('edit_category')->with('category', $categoryData);
    }

    public function editCat($id)
    {
        $cat = category::find($id)->first();
        $categoryData = [];
        $categoryData['id'] = $cat->id;
        $categoryData['name'] = $cat->name;
        $categoryData['parent'] = $cat->parent;
        $categoryData['description'] = $cat->description;
        return view('edit_category')->with('category', $categoryData)->with('name', Auth::user()->name);
    }


    public function editCat_editting($id)
    {
        $category = category::find($id)->first();
        if(Input::has('name')) {
            $category->name = Input::get('name');
        }
        if(Input::has('parent_name'))
        {
            $category->parent = Input::get('parent_name');
        }
        if(Input::has('description'))
        {
            $category->description = Input::get('description');
        }
        if(Input::has('name')&&Input::has('description'))
        {
            $category->save();
            flash('Category added successful', 'success');
        } else
        {
            flash('Name or Description Not Completed', 'danger');
            return view('/edit_category/' . $id);
        }


        return redirect()->route('category');
    }
    public function deleteindex($id)
    {

    }
    public function changeVisibility($id)
    {
        $cat = category::find($id)->first();
        if($cat->visible == '1') {
            $cat->visible = e('0');
            $cat->save();
            flash('Category set to Invisible', 'info');
        } else
        {
            $cat->visible = e('1');
            $cat->save();
            flash('Category set to Visible', 'info');
        }
        return redirect()->route('category');
    }
    public function autocompleteParent()
    {
        $term = Input::get('term');
        $results = [];

        $category = category::where('parent', 'LIKE', '%'.$term.'%')->get();
        foreach($category as $cat)
        {
            $results[] = $cat->name;
        }
        return response()->json($results);
    }
}
