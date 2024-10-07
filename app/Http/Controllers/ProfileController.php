<?php

namespace App\Http\Controllers;


use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class ProfileController extends Controller
{

    public function index()
    {
       $user = DB::table('users')->where('id', Auth::user()->id)->get();
       $produk = DB::table('products')->paginate(10);
       $products = collect(request()->session()->get('cart'));
       $order = DB::table('order_tx')->where('customer_id', Auth::user()->id)->get();
       $count = count($products);
       return view('profile',  compact('user','count','order'));
    }

    public function update(Request $request, $id) : RedirectResponse {
        User::where('id',$id)
        ->update(['name' => $request->name, 'tgl_lahir' => $request->date]);
        return redirect()->back()->with('success', '');
    }
    
    public function updatePassword(Request $request) : RedirectResponse {
        $id = Auth::user()->id;
        $password1 = $request->password1;
        $password2 = $request->password2;
        if($password1 === $password2) {
            User::where('id', $id )
            ->update(['password' => Hash::make($request->password2)]);
            return redirect()->route('profile')->with(['success' => 'Data Berhasil Disimpan!']);
        }
      
    }
}

?>