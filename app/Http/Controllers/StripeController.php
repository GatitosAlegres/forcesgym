<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        $productItems = [];

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        foreach (session('cart')->getItems() as $item) {

            $name = $item->product->name;
            $total = $item->price;
            $quantity = $item->quantity;

            $unit_amount = "$total";
            $unit_amount = round($unit_amount, 2) * 100;

            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $name,
                    ],
                    'currency'     => 'PEN',
                    'unit_amount'  => $unit_amount,
                ],
                'quantity' => $quantity
            ];
        }

        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items'            => [$productItems],
            'mode'                  => 'payment',
            'allow_promotion_codes' => true,
            'metadata'              => [
                'user_id' => "1"
            ],
            'customer_email' => "admin@forcesgym.com",
            'success_url' => route('success'),
            'cancel_url'  => route('cancel'),
        ]);

        return redirect()->away($checkoutSession->url);
    }

    public function success()
    {
        CartController::createSale();
        CartController::clear();
        return redirect()->route('store')->with('success', 'Gracias, usted acaba de completar su pago. ¡Puede ir a recoger su compra!');
    }

    public function cancel()
    {
        return view('cancel');
    }
}
