<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function admin_category()
  {
    $category=Category::get();
     return view('Admin.category',compact('category'));
  }
  public function category_store(Request $req)
  {
    $data = new Category;
    $data->category_name = $req->category_name;
    $data->save();

    return redirect()->back()->with('message', 'category added successfully');
  }
  public function destory( $id)
  {
     $data=Category::find($id);
     $data->delete();
     return redirect()->back()->with('message', 'category Deleted successfully');
  }
  public function product_create()
  {
     return view('Admin.product');
  }
}
