<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Models\products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $products = products::all();
        $customers = customers::all();
        return \view('welcome', \compact('customers', 'products'));
    }

    public function addToCart($id)
    {

        $product = products::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {

            $cart[$id] = [
                "name" => $product->name,
                "qty" => 1,
                "rate" => $product->rate,
                "discount" => 0,
                "paidAmount" => 0,
                
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }



    public function update(Request $request)
    {
        if ($request->id && $request->qty) {
            $cart = session()->get('cart');
            $cart[$request->id]["qty"] = $request->qty;
            session()->put('cart', $cart);
        }
    }


    public function sessionDelete(Request $request)
    {
        $request->session()->forget('key');

        return \redirect()->route('home');
    }
}