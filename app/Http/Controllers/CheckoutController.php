<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Order, OrderItem};

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if(empty($cart)) return redirect()->route('catalogue');
        $total = array_reduce($cart, fn($t,$i) => $t + $i['price_cfa']*$i['qty'], 0);
        $shipping = $total > 30000 ? 0 : 1500;
        $ttc = $total + $shipping;
        return view('checkout.index', compact('cart','total','shipping','ttc'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email',
            'address' => 'required|string',
            'city' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        $cart = session()->get('cart', []);
        if(empty($cart)) return redirect()->route('catalogue');

        $total = array_reduce($cart, fn($t,$i) => $t + $i['price_cfa']*$i['qty'], 0);
        $shipping = $total > 30000 ? 0 : 1500;
        $ttc = $total + $shipping;

        $order = Order::create([
            **$data,
            'total_cfa' => $ttc,
            'status' => 'pending'
        ]);

        foreach($cart as $pid => $item){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $pid,
                'quantity' => $item['qty'],
                'unit_price_cfa' => $item['price_cfa']
            ]);
        }

        session()->forget('cart');
        return redirect()->route('home')->with('ok', 'Commande reçue ! Nous vous contacterons pour la livraison.');
    }
}