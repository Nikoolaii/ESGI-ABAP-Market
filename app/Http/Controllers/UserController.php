<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $userCommandes = auth()->user()->orders;
        return view('profil', compact('userCommandes'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('order', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('editOrder', compact('order'));
    }
}
