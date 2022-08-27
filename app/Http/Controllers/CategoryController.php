<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
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
    $image = $req->image;
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $req->image->move('product', $imageName);
    $product->image = $imageName;
    $product->save();

    return redirect()->back()->with('message', 'product added successfully');
  }
  public function product_show()
  {
    $product = Product::all();
    return view('Admin.product_show', compact('product'));
  }
  public function product_delete($id)
  {
    $data = Product::find($id);

    if (File::exists($data->image)) {
      File::delete($data->image);
    }
    $data->delete();
    return redirect()->back()->with('message', 'product deleted successfully');
  }
  public function product_edit($id)
  {
    $product = Product::find($id);
    return view('Admin.product_update', compact('product'));
  }
  public function update(Request $req, $id)
  {
    $product = Product::find($id);
    $product->title = $req->title;
    $product->description = $req->description;
    $product->price = $req->price;
    $product->discount_price = $req->discount_price;
    $product->category = $req->category;
    $product->quantity = $req->quantity;
    $image = $req->image;
    if($image)

    {
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $req->image->move('product', $imageName);
      $product->image = $imageName;
    }
 
    $product->save();

    return redirect()->back()->with('message', 'product added successfully');
  }
  public function details($id)
  {
    $product=Product::find($id);
    return view('User.product_details' ,compact('product'));
  }
  public function cart(Request $req,$id)
  {
    
    if(Auth::id())
    {
      $user=Auth::user();  
      $product=Product::find($id);
      $cart =new Cart;
      $cart->name=$user->name;
      $cart->email=$user->email;
      $cart->phone=$user->phone;
      $cart->address=$user->address;
      $cart->user_id=$user->id;
      $cart->image=$product->image;
      $cart->product_title=$product->title;
      $cart->quantity=$req->quantity;
      $cart->product_id=$product->id;
      if($product->discount_price)
      {
        $cart->price=$product->discount_price * $req->quantity;
      }
      else
      {
        $cart->price=$product->price * $req->quantity;
      }
      
      $cart->save();
  
     

 
      
    }
    else
    {
      return redirect('login');
    }
  }
}
