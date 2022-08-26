<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
   public function redirect()
   {
      $role=Auth::user()->role;

      if($role=='1')
      {
        return view('Admin.home');
      }
      else{
        return view('User.userpage');
      }
   }
   public function index()
   {
      return view('User.userpage');
   }
}
