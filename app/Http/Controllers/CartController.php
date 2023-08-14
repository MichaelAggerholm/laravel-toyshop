<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request ,$id)
    {
        $product = Product::findOrFail($id);
        $color   = Color::findOrFail($request->color);

        $item = [
            'product' => $product,
            'quantity' => $request->quantity,
            'color' => $color
        ];

        if (session()->has('cart'))
        {
            // Already exists, increment the quantity
            $cart = session()->get('cart');
            $key  = $this->checkItemInCart($item);

            if ($key != -1)
            {
                $cart[$key]['quantity'] += $request->quantity;
                session()->put('cart', $cart);
            } else {
                session()->push('cart', $item);
            }

            // New item

        } else {
            session()->put('cart', [$item]);
        }

        return back()->with('addedToCart', 'Varen blev tilføjet til kurven');
    }

    public function checkItemInCart($item)
    {
        foreach (session()->get('cart') as $key => $value)
        {
            if ($value['product']['id'] == $item['product']['id'] && $value['color']['id'] == $item['color']['id'])
            {
                return $key;
            }
        }
        return -1;
    }
}
