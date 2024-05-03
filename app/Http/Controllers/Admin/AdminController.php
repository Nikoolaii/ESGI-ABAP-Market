<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $elementToManage = [
            'products' => ['name' => 'Products', 'route' => 'admin.products.index'],
            'orders' => ['name' => 'Orders', 'route' => 'admin.orders.index'],
        ];
        return view('admin.index', compact('elementToManage'));
    }
}
