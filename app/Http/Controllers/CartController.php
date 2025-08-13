<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach($cart as $item){ $total += $item['price_cfa'] * $item['qty']; }
        $shipping = $total > 30000 ? 0 : 1500;
        $ttc = $total + $shipping;
        return view('cart.index', compact('cart','total','shipping','ttc'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        $qty = (int)($request->input('qty', 1));
        if(isset($cart[$id])) { $cart[$id]['qty'] += $qty; }
        else {
            $cart[$id] = [
                'name' => $product->name,
                'price_cfa' => $product->price_cfa,
                'image_url' => $product->image_url,
                'qty' => $qty,
                'slug' => $product->slug
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('panier.index')->with('ok','Produit ajouté au panier.');
    }

    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return back()->with('ok','Produit retiré.');
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('ok','Panier vidé.');
    }
}