<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Image;
use File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view ('pages.products.manage', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|max:255',
            'description'   => 'required|max:1200',
            'brand_id'      => 'numeric',
            'category_id'   => 'required|numeric',
            'price'         => 'required|numeric',
        ]);

        $product = new Product();
        $product->title             = $request->title;
        $product->description       = $request->description;
        $product->slug              = Str::slug($request->title);
        $product->price             = $request->price;
        $product->offer_price       = $request->offer_price;
        $product->quantity          = $request->quantity;
        $product->brand_id          = $request->brand_id;
        $product->category_id       = $request->category_id;
        $product->status            = $request->status;
        $product->featured          = $request->featured;

        $product->save();

        // Check if the Product has Multiple Image
        if ( count( $request->product_images ) > 0 )
        {
            foreach( $request->product_images as $image )
            {
                $img = rand(0,9999999) . '_' . $image->getClientOriginalName();
                $location = public_path('img/products/' . $img);
                Image::make($image)->save($location);

                // Create the ProductImage OBJ
                $product_images = new ProductImage;
                // Insert the Data inside the Product Image Table
                $product_images->product_id = $product->id;
                $product_images->name = $img;
                $product_images->save();
            }
        }

        return redirect()->route('product.manage');
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
        $product = Product::find($id);
        if ( !is_null($district) ){
            $product_images = ProductImage::where('product_id', $product->id)->get();
            return view('pages.products.edit', compact('product', 'product_images'));
        }
        else{
            return redirect()->route('product.manage');
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
        $request->validate([
            'title'         => 'required|max:255',
            'description'   => 'required|max:1200',
            'brand_id'      => 'numeric',
            'category_id'   => 'required|numeric',
            'price'         => 'required|numeric',
        ]);

        $product = Product::find($id);
        $product->title             = $request->title;
        $product->description       = $request->description;
        $product->slug              = Str::slug($request->title);
        $product->price             = $request->price;
        $product->offer_price       = $request->offer_price;
        $product->quantity          = $request->quantity;
        $product->brand_id          = $request->brand_id;
        $product->category_id       = $request->category_id;
        $product->status            = $request->status;
        $product->featured          = $request->featured;

        $product->save();

        // Check if product has old images
        $old_images = ProductImage::where('product_id', $product->id)->get();
        if( count($old_images) > 0 ){
            foreach( old_images as old_image ){
                if ( File::exists('assets/img/products/' . $old_image->name ) ){
                    File::delete('assets/img/products/' . $old_image->name);
                }
            }
        }
        // Check if the Product has Multiple Image
        if ( count( $request->product_images ) > 0 )
        {
            foreach( $request->product_images as $image )
            {
                $img = rand(0,9999999) . '_' . $image->getClientOriginalName();
                $location = public_path('img/products/' . $img);
                Image::make($image)->save($location);

                // Create the ProductImage OBJ
                $product_images = new ProductImage;
                // Insert the Data inside the Product Image Table
                $product_images->product_id = $product->id;
                $product_images->name = $img;
                $product_images->save();
            }
        }

        return redirect()->route('product.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if ( !is_null($product) ){
            $product_images = ProductImage::where($id)->get();
            if( count($product_images) > 0 ){
                foreach( $product_images as $product_image ){

                    // Delete Existing Image
                    if ( File::exists('assets/img/products/' . $product_image->name ) ){
                        File::delete('assets/img/products/' . $product_image->name);
                    }
                }
            }
            $product->delete();
            return redirect()->route('product.manage');
        }
        else{
            return redirect()->route('product.manage');
        }
    }
}
