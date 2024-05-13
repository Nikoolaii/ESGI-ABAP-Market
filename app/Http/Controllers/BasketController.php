<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class BasketController extends Controller
{

    public function index()
    {
        $basket = $this->getBasketElements();
        return view('basket.index', ['basket' => $basket]);
    }

    public function getBasketElements()
    {
        return session()->get('basket');
    }

    public function addElementToBasket(Request $request)
    {
        $product = Product::find($request->product_id);
        $basket = session()->get('basket');
        if (!$basket) {
            $basket = [
                $product->id => [
                    'quantity' => $request->quantity,
                ]
            ];
            session()->put('basket', $basket);
            return redirect()->back()->with('success', 'Product added to basket successfully!');
        }
        if (isset($basket[$product->id])) {
            $basket[$product->id]['quantity'] = $basket[$product->id]['quantity'] + $request->quantity;
            session()->put('basket', $basket);
            return redirect()->back()->with('success', 'Product added to basket successfully!');
        }
        $basket[$product->id] = [
            'quantity' => $request->quantity,
        ];
        session()->put('basket', $basket);
        return redirect()->back()->with('success', 'Product added to basket successfully!');
    }

    public function removeElementFromBasket($id)
    {
        $product = Product::find($id);
        $basket = session()->get('basket');
        if (isset($basket[$id])) {
            unset($basket[$id]);
            session()->put('basket', $basket);
        }
        return redirect()->back()->with('success', 'Product removed from basket successfully!');
    }
}
