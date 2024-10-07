<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Product;
use App\Models\Order;

use DB;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index() : View
    {
        $produk = DB::table('products')->get();
        $user = DB::table('users')->get();
        $order = Order::with('orderDetail.menuItem')->get();
        // dd($order->toArray());
        return view('dashboard', compact('order','user', 'produk'));
    }

    public function updateStatus(Request $request) {
        $orderId = $request->input('order_id');
        $newStatus = $request->input('status');

        $order = Order::where('order_id', $orderId)->first();

        if ($order) {
            // Update status order
            Order::where('order_id', $orderId)->update(['order_status' => $newStatus]);
            // $order->order_status = $newStatus;
            // $order->save();
            return response()->json(['success' => true, 'message' => 'Status berhasil diperbarui.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Order tidak ditemukan.'], 404);
        }

    }

    public function actionstore(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'gambar'  => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required|min:5',
            'desc'=> 'required|min:10',
        ]);

        //upload image
        $image = base64_encode(file_get_contents($request->file('gambar')));
        $file = $request->file('gambar')->getMimeType();
        $gambarData = 'data:' . $file . ';charset=utf-8' . ';base64,' . $image;

        //randID
        $randangka = rand(100,999);
        $id_produk = "ALB" . $randangka;

        //create post
        Product::create([
            'item_id' => $id_produk,
            'gambar'     => $gambarData,
            'nama'     => $request->name,
            'desc_produk' => $request->desc,
            'harga' => $request->price
        ]);

        //redirect to index
        return redirect()->route('dashboard.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function actionUpdate(Request $request, $id) : RedirectResponse{
        $this->validate($request, [
            'nameEdit' => 'required|min:5',
            'descEdit'=> 'required|min:10',
        ]);

          if ($request->hasFile('gambarEdit')) {
            $image = base64_encode(file_get_contents($request->file('gambarEdit')));
            $file = $request->file('gambarEdit')->getMimeType();
            $gambarData = 'data:' . $file . ';charset=utf-8' . ';base64,' . $image;
             $this->validate($request, [
            'gambarEdit'  => 'required|image|mimes:jpeg,jpg,png|max:2048'
             ]);
            Product::where('item_id', $id)
            ->update(['nama' => $request->nameEdit, 'desc_produk' => $request->descEdit, 'harga' => $request->priceEdit, 'gambar' => $gambarData]);
        } else {
            Product::where('item_id', $id)
            ->update(['nama' => $request->nameEdit, 'desc_produk' => $request->descEdit, 'harga' => $request->priceEdit]);
        }

        return redirect()->route('dashboard.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function actionDelete($id){
        Product::destroy($id);
        return redirect()->route('dashboard.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function updatePasswordAdmin(Request $request) {
        $id = Auth::user()->id;
        $password1 = $request->password1;
        $password2 = $request->password2;
        if($password1 === $password2) {
            User::where('id', $id)
            ->update(['password' => Hash::make($request->password2)]);
            return redirect()->route('profile')->with(['success' => 'Data Berhasil Disimpan!']);
        }
    }
}   