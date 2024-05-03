<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function getBasket() {
        $basket = $this->getBasketElements();
        return view('basket', ['basket' => $basket]);
    }

    public function getBasketElements(){
        return session()->get('basket');
    }
    public function addElementToBasket($id) {
        $product = Product::find($id);
        $basket = session()->get('basket');
        if (!$basket) {
            $basket = [
                $id => [
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price
                ]
            ];
            session()->put('basket', $basket);
            return redirect()->back()->with('success', 'Product added to basket successfully!');
        }
        if (isset($basket[$id])) {
            $basket[$id]['quantity']++;
            session()->put('basket', $basket);
            return redirect()->back()->with('success', 'Product added to basket successfully!');
        }
        $basket[$id] = [
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->price
        ];
        session()->put('basket', $basket);
        return redirect()->back()->with('success', 'Product added to basket successfully!');
    }

    public function removeElementFromBasket($id) {
        $product = Product::find($id);
        $basket = session()->get('basket');
        if (isset($basket[$id])) {
            unset($basket[$id]);
            session()->put('basket', $basket);
        }
        return redirect()->back()->with('success', 'Product removed from basket successfully!');
    }
}
