<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $produk = DB::table('products')->paginate(10);
        $products = collect(request()->session()->get('cart'));
        $count = count($products);
        return view('home',  compact('produk', 'count' ));
    }

   public function search(Request $request)
   {
    $search = $request->search;

    $produk = DB::table('products')
    ->where('nama','like',"%".$search."%")->paginate();
    $products = collect(request()->session()->get('cart'));
    $count = count($products);
    return view('home',  compact('produk', 'count' ));

   }

   public function profile() : View
   {
       $user = DB::table('users')->where('id', Auth::user()->id );
       $produk = DB::table('products')->paginate(10);
       $products = collect(request()->session()->get('cart'));
       $count = count($products);
       return view('home',  compact('user','count'));
   }

}
