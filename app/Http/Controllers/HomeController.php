<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
  public function redirect()
  {
    $role = Auth::user()->role;

    if ($role == '1') {
      $totalproduct = Product::all()->count();
      $totalorder = Order::all()->count();
      $totaluser = User::all()->count();
      $totalrevinew = 0;
      $order = Order::all();
      foreach ($order as $order) {
        $totalrevinew = $totalrevinew + $order->price;
      }
      $total_delivered = Order::where('delivery_status', '=', 'delivered')->get()->count();
      $total_processing = Order::where('delivery_status', '=', 'processing')->get()->count();
      return view('Admin.home', compact('totalproduct', 'totalorder', 'totaluser', 'totalrevinew', 'total_delivered', 'total_processing'));
    } else {
      $product = Product::paginate(5);
     
      return view('User.userpage', compact('product'));
    }
  }
  public function index()
  {

    $product = Product::paginate(5);
     
    return view('User.userpage', compact('product' ));
  }
}
