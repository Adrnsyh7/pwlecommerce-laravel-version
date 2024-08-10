<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use DB;

class ProfileController extends Controller
{

public function index()
   {
       $user = DB::table('users')->where('id', Auth::user()->id)->get();
       $produk = DB::table('products')->paginate(10);
       $products = collect(request()->session()->get('cart'));
       $count = count($products);
       return view('profile',  compact('user','count'));
   }

}

?>