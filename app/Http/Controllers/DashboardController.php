<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Product;

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
        return view('dashboard', ['produk' => $produk], ['user' => $user]);
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
            'id' => $id_produk,
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
            Product::where('id', $id)
            ->update(['nama' => $request->nameEdit, 'desc_produk' => $request->descEdit, 'harga' => $request->priceEdit, 'gambar' => $gambarData]);
        } else {
            Product::where('id', $id)
            ->update(['nama' => $request->nameEdit, 'desc_produk' => $request->descEdit, 'harga' => $request->priceEdit]);
        }

        // Product::where('id', $id)
        // ->update(['nama' => $request->nameEdit]);


        return redirect()->route('dashboard.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function actionDelete($id){
        Product::destroy($id);
        return redirect()->route('dashboard.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
}   