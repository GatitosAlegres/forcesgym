<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('shop.store', compact('products', 'categories'));
    }

    public function cart()
    {
        $categories = Category::all();
        return view('shop.cart', compact('categories'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', new Cart());

        if ($cart->wasAdded($id)) {

            $cart->updateItem($id, $cart->findItem($id)->quantity + 1);
        } else {

            $cart->addItem($product, 1, $product->sale_price);
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', '¡Producto agregado al carrito con éxito!');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;

        if ($id && $quantity) {

            $cart = session()->get('cart');

            $cart->updateItem($id, $cart->findItem($id)->quantity + $quantity);

            session()->put('cart', $cart);

            session()->flash('success', '¡Carrito actualizado con éxito!');
        }
    }

    public function remove($id)
    {

        if ($id) {

            $cart = session()->get('cart');

            if ($cart->wasAdded($id)) {

                $cart->removeItem($id);

                session()->put('cart', $cart);
            }

            session()->flash('success', '¡Producto eliminado con éxito!');

            return redirect()->back();
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
            'user_id' => auth()->user()->id,
            'amount' => 0,
        ]);

        $cart = session()->get('cart', new Cart());

        foreach ($cart->getItems() as $item) {
            $newSaleDetail = SaleDetail::create([
                'sale_id' => $newSale->id,
                'product_id' => $item->product->id,
                'quantity' => $item->quantity,
                'price_unitary' => $item->product->unit_price,
                'sub_amount' => $item->calculateSubtotal(),
            ]);
        }
    }
}
