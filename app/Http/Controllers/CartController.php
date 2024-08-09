<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function detail($request) {
        $produk = DB::table('products')->where('id', $request)->get();
        $products = collect(request()->session()->get('cart'));
        $count = count($products);
        return view('detail',  compact('produk', 'count' ));
    }

    public function addcart(Request $request) {

        $id = $request->id;
        $product = Product::find($id);

        if (!$product) {

            abort(404);
        }

        $cart = session()->get('cart');

        if (!$cart) {

            $cart = 
            [
             $id => [
            "id" => $request->id,
            "nama" => $product->nama,
            "quantity" => $request->quantity,
            'desc_produk' => $product->desc_produk,
            'harga' => $product->harga,
            "gambar" => $product->gambar
        ]
                ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        $cart[$id] = [
            "id" => $request->id,
            "nama" => $product->nama,
            "quantity" => $request->quantity,
            'desc_produk' => $product->desc_produk,
            'harga' => $product->harga,
            "gambar" => $product->gambar
        ];

        session()->put('cart', $cart);
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Product added to cart successfully!']);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart(Request $request) {
        $products = collect(request()->session()->get('cart'));
        $total = 0;
        foreach($products as $product ) {
            $subtotal = $product['harga'] * $product['quantity'];
            $total += $subtotal;
                }

        $count = count($products);
        return view('cart', compact('products', 'total', 'count'));
    }

    public function update(Request $request) : RedirectResponse {
        $kuantiti = $request->kuantiti;
        $action = $request->action;
        $id = $request->id;
        $cart = session()->get('cart');
         if (isset($cart[$id]) ) {
            if (isset($action)) {
                if ($action == "increase") {
                    $cart[$id]['quantity']++;
                } elseif ($action == "decrease") {
                    $cart[$id]['quantity']--;
                    // Hapus produk jika quantity kurang dari 1
                    if ($cart[$id]['quantity'] < 1) {
                        unset($cart[$id]);
                    }
                }
            }  else {
                // Memastikan kuantiti adalah angka positif
                $kuantiti = abs($kuantiti);
                $cart[$id]['quantity'] = $kuantiti;
            }
    }
                $cart_products = collect(request()->session()->get('cart'));
                $cart_total = 0;

            
          session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Jumlah produk diperbarui!');
    }
}
