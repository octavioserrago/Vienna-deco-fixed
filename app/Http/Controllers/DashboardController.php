<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Cargar todos los productos
        $products = Product::all();

        // Obtener las ventas del usuario autenticado
        $sales = Sale::with('items.product')->where('user_id', Auth::id())->get();

        // Si el usuario es administrador, obtener todas las ventas
        if (Auth::user()->isAdmin()) {
            $allSales = Sale::with('items.product', 'user')->get();
        } else {
            $allSales = collect(); // Crear una colección vacía si no es administrador
        }

        return view('dashboard', compact('products', 'sales', 'allSales'));
    }

    public function updateStatus(Request $request, Sale $sale)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        // Si la venta se cancela, devolver el stock de los productos
        if ($request->status == 'cancelled' && $sale->status != 'cancelled') {
            foreach ($sale->items as $item) {
                $product = $item->product;
                $product->stock += $item->quantity;
                $product->save();
            }
        }

        $sale->status = $request->status;
        $sale->save();

        return redirect()->route('dashboard')->with('success', 'Estado de la venta actualizado correctamente.');
    }
}