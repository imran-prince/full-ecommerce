<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function admin_category()
  {
    $category = Category::get();
    return view('Admin.category', compact('category'));
  }
  public function category_store(Request $req)
  {
    $data = new Category;
    $data->category_name = $req->category_name;
    $data->save();

    return redirect()->back()->with('message', 'category added successfully');
  }
  public function destory($id)
  {
    $data = Category::find($id);
    $data->delete();
    return redirect()->back()->with('message', 'category Deleted successfully');
  }
  public function product_create()
  {
    $category = Category::all();
    return view('Admin.product', compact('category'));
  }
  public function product_store(Request $req)
  {
    $product = new Product;
    $product->title = $req->title;
    $product->description = $req->description;
    $product->price = $req->price;
    $product->discount_price = $req->discount_price;
    $product->category = $req->category;
    $product->quantity = $req->quantity;
    $image=$req->image;
    $imageName=time().'.'.$image->getClientOriginalExtension();
    $req->image->move('product',$imageName);
    $product->image=$imageName;
    $product->save();
   
     return redirect()->back()->with('message', 'product added successfully');
  }
  public function product_show()
  {
      $product=Product::all();
      return view('Admin.product_show',compact('product'));
  }
}
