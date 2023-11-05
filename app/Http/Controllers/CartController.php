<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('store', compact('products'));
    }

    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "image" => $product->image,
                "price" => $product->sale_price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', '¡Producto agregado al carrito con éxito!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', '¡Carrito actualizado con éxito!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', '¡Producto eliminado con éxito!');
        }
    }

    public static function clear()
    {
        session()->forget('cart');
    }

    public static function createSale()
    {
        $newSale = Sale::create([
            'date' => now(),
            'user_id' => '1',
            'amount' => 0,
        ]);

        $cart = session()->get('cart', []);

        foreach ($cart as $id => $details) {
            $newSaleDetail = SaleDetail::create([
                'sale_id' => $newSale->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price_unitary' => $details['price'],
                'sub_amount' => $details['price'] * $details['quantity'],
            ]);
        }
    }
}
