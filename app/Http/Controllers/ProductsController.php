<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryPostRequest;
use App\Http\Requests\ProductPostRequest;
use App\Product;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin',['except'=>array('index','show')]);
    }
    public function index() {
        $products = Product::latest()->where('is_live',1)->paginate(9);
        $settings = Setting::all();
        return view('cissie.home', compact('products','settings'));
    }
    public function catUpdate(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->back()->with('catmessage','Category successfully updated!');
    }
    public function productUpdate(Request $request, $id) {
        $product = Product::findOrFail($id);
        if($request->file('product_image')){
            $productphoto = $request->file('product_image')->store('public/product/photos');
        } else {
            $productphoto = $product->product_image;
        }
        $product->update([
            'title'=>request('title'),
            'description'=>request('description'),
            'cost'=>request('cost'),
            'height'=>request('height'),
            'width'=>request('width'),
            'category_id'=>request('category_id'),
            'is_live'=>request('is_live'),
            'product_image'=>$productphoto,
        ]);
        return redirect()->back()->with('message','Product successfully updated!');
    }
    public function store(ProductPostRequest $request) {
        $productphoto = $request->file('product_image')->store('public/product/photos');

        Product::create([
            'title'=>request('title'),
            'slug'=>str_slug(request('title')),
            'description'=>request('description'),
            'product_image'=>$productphoto,
            'height'=>request('height'),
            'width'=>request('width'),
            'cost'=>request('cost'),
            'category_id'=>request('category_id'),
            'is_live'=>request('is_live')
        ]);

        //LOGGING
        Log::info('Product Name: '.request('title').'');

        return redirect()->back()->with('message','Product added successfully!');
    }

    public function categoryAdd(CategoryPostRequest $request) {
        Category::create([
            'category_name'=>request('category_name')
        ]);
        return redirect()->back()->with('catmessage','Category added successfully!');
    }
    public function categoryDestroy(Request $request)
    {
        $category = Category::findOrFail(request('category_id'));
        $category->delete();
        return redirect()->back()->with('catmessage','Category deleted!');
    }
    public function productDestroy(Request $request)
    {
        $product = Product::findOrFail(request('id'));
        $product->delete();
        return redirect()->back()->with('productmessage','Product deleted!');
    }
    public function update(Request $request) {
        $setting = Setting::findOrFail(request('id'));
        $setting->update($request->all());
        return redirect()->back()->with('message','Settings successfully updated!');
    }
    public function settings() {
        $settings = Setting::get()->where('id',1);
        $categories = Category::get()->all();
        $products = Product::get()->all();
        return view('admin.settings', compact('settings', 'categories', 'products'));
    }
}
