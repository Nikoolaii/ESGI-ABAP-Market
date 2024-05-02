<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\User;


class HomeController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $totalOrdered = OrderItem::sum('quantity');
        $users = User::count();
        $discount = Discount::where('expires_at', '>', now())
            ->orderBy('expires_at', 'asc')
            ->first();

        return view('home', [
            'discount' => $discount,
            'products' => $products,
            'totalOrdered' => $totalOrdered,
            'users' => $users
        ]);
    }

}
