<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $userOrders = auth()->user()->orders;
        return view('profil', compact('userOrders'));
    }


}
