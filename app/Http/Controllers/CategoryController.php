<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Stripe;
use PDF;

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
    if ($image) {
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $req->image->move('product', $imageName);
      $product->image = $imageName;
    }

    $product->save();

    return redirect()->back()->with('message', 'product added successfully');
  }
  public function details($id)
  {
    $product = Product::find($id);
    return view('User.product_details', compact('product'));
  }
  public function cart(Request $req, $id)
  {

    if (Auth::id()) {
 
      $user = Auth::user();
      $product = Product::find($id);
      $cart = new Cart;
      $cart->name = $user->name;
      $cart->email = $user->email;
      $cart->phone = $user->phone;
      $cart->address = $user->address;
      $cart->user_id = $user->id;
      $cart->image = $product->image;
      $cart->product_title = $product->title;
      $cart->quantity = $req->quantity;
 
      $cart->product_id = $product->id;
      if ($product->discount_price) {
        $cart->price = $product->discount_price * $req->quantity;
      } else {
        $cart->price = $product->price * $req->quantity;
      }
 Alert::success('prduct added successfullay');
      $cart->save();


      return redirect()->back();
    } else {
      return redirect('login');
    }
  }
  public function cart_show()
  {
    if (Auth::id()) {
      $id = Auth::user()->id;
      $data = Cart::where('user_id', '=', $id)->get();

      return view('User.cart_show', compact('data'));
    } else {
      return redirect('login');
    }
  }
  public function remove($id)
  {
    $data = Cart::find($id);
    $data->delete();
    return redirect()->back();
  }
  public function cash()
  {
    $user = Auth::user();
    
    $user_id = $user->id;
     
    $data = Cart::where('user_id', '=', $user_id)->get();
 
 
    foreach ($data as $data) {
      $order = new Order;
      $order->name = $data->name;
      $order->email = $data->email;
      $order->phone = $data->phone;
      $order->address = $data->address;
      $order->user_id = $data->user_id;
      $order->product_title = $data->product_title;
      $order->price = $data->price;
      $order->quantity = $data->quantity;
      $order->image = $data->image;
      $order->product_id = $data->product_id;
   
      $order->payment_status = "cash on delivery";
      $order->delivery_status = "processing";
      $order->save();
      $cart_id = $data->id;
      $cart = Cart::find($cart_id);
      $cart->delete();
    }
    
    return redirect()->back()->with('message', 'We have received your order. We will connect with you soon...');
  }
  public function stripe($totalprice)
  {
    return view('User.stripe', compact('totalprice'));
  }
  public function stripePost(Request $request, $totalprice)
  {
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create([
      "amount" => $totalprice * 100,
      "currency" => "usd",
      "source" => $request->stripeToken,
      "description" => "Thanks for payment"
    ]);
    $user = Auth::user();
    $user_id = $user->id;
    $data = Cart::where('user_id', '=', $user_id)->get();
    foreach ($data as $data) {
      $order = new Order;
      $order->name = $data->name;
      $order->email = $data->email;
      $order->phone = $data->name;
      $order->address = $data->address;
      $order->user_id = $data->user_id;
      $order->product_title = $data->product_title;
      $order->price = $data->price;
      $order->quantity = $data->quantity;
      $order->image = $data->image;
      $order->product_id = $data->product_id;
      $order->payment_status = "paid";
      $order->delivery_status = "processing";
      $order->save();
      $cart_id = $data->id;
      $cart = Cart::find($cart_id);
      $cart->delete();
    }

    Session::flash('success', 'Payment successful!');

    return back();
  }
  public function admin_order( )
  {
    $order=Order::all(); 
    return view('Admin.order',compact('order'));
  }
  public function delivery($id)
  {
     $data=Order::find($id);
     $data->delivery_status='delivered';
     $data->payment_status='paid';
     $data->save();
     return redirect()->back();
  }
  public function pdf($id)
  {
     $data=Order::find($id);
     $pdf =PDF::loadView('Admin.pdf',compact('data'));
     return $pdf->download('order_details.pdf');
  }
  public function search(Request $req)
  {
     $searchtxt=$req->search;
      $order=Order::where('name','LIKE',"%$searchtxt%")->orWhere('product_title','LIKE',"%$searchtxt%")->orWhere('product_title','LIKE',"%$searchtxt%")->get();
      return view('Admin.order',compact('order'));
  }
  public function order_show()
  {
      if(Auth::id())
      {
        $user=Auth::user()->id;
         $order=Order::where('user_id','=',$user)->get();
         return view('User.order',compact('order'));
      }
      else
      {
        return redirect('login');
      }
  }
  public function order_cencel($id)
  {
      $order=Order::find($id);
      // $order->delivery_status='You cancel the order';

      $order->save();
      $order->delete();
      return redirect()->back();
  }
  public function user_search(Request $req)
  {
      $searchtxt=$req->search;
   
      $product=Product::where('title','LIKE',"%$searchtxt%")->orWhere('category','LIKE',"%$searchtxt%")->paginate(6);
      
      return view('User.userpage',compact('product'));
  }
  public function all_product()
  {
     $product=Product::paginate(20);
     return view('User.all_product',compact('product'));
  }
  public function contact( )
  {
    return view('User.contact');
  }
  public function blog( )
  {
    return view('User.blog');
  }
}
