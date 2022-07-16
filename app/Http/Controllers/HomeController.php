<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Models\inventories;
use App\Models\inventory_products;
use App\Models\products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $paidAmount;

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
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back();
    }



    public function updateCart(Request $request)
    {
        if ($request->id && $request->qty) {
            $cart = session()->get('cart');
            $cart[$request->id]["qty"] = $request->qty;
            session()->put('cart', $cart);
        }
    }

    public function updateDiscount(Request $request)
    {
        if ($request->id && $request->discount) {
            if ($request->discount == 0) {
                $cart = session()->get('cart');
                $cart[$request->id]["discount"] = $request->discount;
                session()->put('cart', $cart);
            } else {
                $cart = session()->get('cart');
                $cart[$request->id]["discount"] = $request->discount;
                session()->put('cart', $cart);
            }
        }
    }


    public function updateAmount(Request $request)
    {
        session()->put('paidAmount', 0);

        if ($request->paidAmount) {
            // $paidAmount = session()->get('paidAmount', 0);
            // $paidAmount["piadAmount"] = $request->paidAmount;
            session()->put('paidAmount', $request->paidAmount);
        }
    }

    public function saveChanges(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'date' => 'required',
                'customerId' => 'required',
                'totalDiscount' => 'required',
                'totalBillamount' => 'required',
                'dueAmount' => 'required',
                'paidAmount' => 'required',
            ]);
            $inventory = inventories::create([
                'date' => $request->date,
                'billNo' => mt_rand(10000000, 99999999),
                'customerId' => $request->customerId,
                'totalDiscount' => $request->totalDiscount,
                'totalBillamount' => $request->totalBillamount,
                'dueAmount' => $request->datedueAmount,
                'paidAmount' => $request->paidAmount,
            ]);

            foreach ((array) \session('cart') as $id => $details) {
                inventory_products::create([
                    'inventoryId' => $inventory->id,
                    'productId' => $id,
                    'rate' => $details['rate'],
                    'qty' => $details['qty'],
                    'discount' => $details['discount'],
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function session(Request $request)
    {
        dd(session()->all());
    }
}