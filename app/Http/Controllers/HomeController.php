<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;


class HomeController extends Controller
{
    public function index()
    {
        $discount = Discount::where('expires_at', '>', now())
            ->orderBy('expires_at', 'asc')
            ->first();
        return view('home', [
            'discount' => $discount
        ]);
    }

}
