<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('pages.categories.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $primary_categories = Category::orderBy('name', 'asc')->where('parent_id', 0)->get();
        return view('pages.categories.create', compact('primary_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name            = $request->name;
        $category->description     = $request->description;
        $category->slug            = Str::slug($request->name);
        $category->parent_id       = $request->parent_id;

        if ( !empty($request->image) )
        {
            $image = $request->file('image');
            //$img = rand(0,9999999) . '_' . $image->getClientOriginalName();
            $img = rand(0,9999999) . '_' . $image->getClientOriginalName();
            $location = public_path('assets/img/categories/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;
        }
        
        $category->save();

        return redirect()->route('category.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $primary_categories = Category::orderBy('name', 'asc')->where('parent_id', 0)->get();

        if ( !is_null($category) ){
            return view('pages.categories.edit', compact('category', 'primary_categories'));
        }
        else{
            return redirect()->route('category.manage');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name            = $request->name;
        $category->description     = $request->description;
        $category->slug            = Str::slug($request->name);
        $category->parent_id       = $request->parent_id;

        if ( !empty($request->image) )
        {
            // Delete Existing Image
            if ( File::exists('assets/img/categories/' . $category->image ) ){
                File::delete('assets/img/categories/' . $category->image);
            }

            $image = $request->file('image');
            $img = rand(0,9999999) . '_' . $image->getClientOriginalName();
            $location = public_path('assets/img/categories/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;
        }
        
        $category->save();

        return redirect()->route('category.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if ( !is_null($category) ){
            // Delete Existing Image
            if ( File::exists('backend/img/categories/' . $category->image ) ){
                File::delete('assets/img/categories/' . $category->image);
            }
            $category->delete();
            return redirect()->route('category.manage');
        }
        else{
            return redirect()->route('category.manage');
        }
    }
}
