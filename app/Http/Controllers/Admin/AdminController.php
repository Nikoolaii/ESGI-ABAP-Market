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
            'categories' => ['name' => 'Categories', 'route' => 'admin.categories.index'],
        ];
        return view('admin.index', compact('elementToManage'));
    }
}
