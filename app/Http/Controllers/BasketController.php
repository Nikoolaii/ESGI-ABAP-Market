<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;


class BasketController extends Controller
{

    public function index()
    {
        $basket = $this->getBasketElements();
        $total = session()->get('total');
        return view('basket.index', ['basket' => $basket, 'total' => $total]);
    }

    public function getBasketElements()
    {
        $basketElements = [];
        $total = 0;
        if (session()->has('basket')) {
            foreach (session('basket') as $id => $basket) {
                $product = Product::find($id);
                $basket['product'] = $product;
                $basket['total'] = $product->price * $basket['quantity'];
                $basket['quantity'] = $basket['quantity'];
                $basket['id'] = $id;
                $basket['price'] = $product->price * $basket['quantity'];
                $total += $basket['price'];
                $basketElements[] = $basket;
            }
        }
        session()->put('total', $total);
        return $basketElements;
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $basket = session()->get('basket');
        if ($request->quantity > $product->stock) {
            return redirect()->back()->with('error', 'The quantity of the product is not enough!');
        }
        if ($request->quantity < 1) {
            return redirect()->back()->with('error', 'The quantity of the product must be at least 1!');
        }
        $basket[$id]['quantity'] = $request->quantity;
        session()->put('basket', $basket);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $basket = session()->get('basket');
        if (isset($basket[$id])) {
            unset($basket[$id]);
            session()->put('basket', $basket);
        }
        return redirect()->back()->with('success', 'Product removed from basket successfully!');
    }

    public function addElementToBasket(Request $request)
    {
        $product = Product::find($request->product_id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }
        if ($request->quantity < 1) {
            return redirect()->back()->with('error', 'The quantity of the product must be at least 1!');
        }
        if ($request->quantity > $product->stock) {
            return redirect()->back()->with('error', 'The quantity of the product is not enough!');
        }
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
            if ($basket[$product->id]['quantity'] > $product->stock) {
                return redirect()->back()->with('error', 'The quantity of the product is not enough!');
            }
            session()->put('basket', $basket);
            return redirect()->back()->with('success', 'Product added to basket successfully!');
        }
        $basket[$product->id] = [
            'quantity' => $request->quantity,
        ];
        session()->put('basket', $basket);
        return redirect()->back()->with('success', 'Product added to basket successfully!');
    }

    public function addPromo(Request $request)
    {
        $promo = $request->promo;
        $discount = Discount::where('code', $promo)->first();
        if (!$discount) {
            return redirect()->back()->with('error', 'Promo code not found!');
        }
        if ($discount->created_at > now() || $discount->expires_at < now()) {
            return redirect()->back()->with('error', 'Promo code is not valid!');
        }
        $total = session()->get('total');
        $priceAfterDiscount = ($total - $discount->value / 100 * $total);
        $priceAfterDiscount = number_format((float)$priceAfterDiscount, 2, '.', '');
        session()->put('total', $total);
        session()->put('promo', [
            'code' => $discount->code,
            'discount' => $discount->value,
            'priceAfterDiscount' => $priceAfterDiscount
        ]);
        return redirect()->back()->with('success', 'Promo code added successfully!');
    }

    public function removePromo()
    {
        session()->forget('promo');
        return redirect()->back()->with('success', 'Promo code removed successfully!');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
