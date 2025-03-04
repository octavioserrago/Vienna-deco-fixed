<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // Cargar todos los productos
        $products = Product::all();

        // Pasar los productos a la vista
        return view('dashboard', compact('products'));
    }
}