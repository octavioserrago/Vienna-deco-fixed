<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Obtener el carrito desde la sesión
        $cart = session()->get('cart', []);

        // Calcular el total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    public function addToCart($id)
        {
            // Buscar el producto por su ID
            $product = Product::findOrFail($id);

            // Obtener el carrito desde la sesión
            $cart = session()->get('cart', []);

            // Verificar si el producto ya está en el carrito
            if (isset($cart[$id])) {
                // Si ya está, incrementamos la cantidad
                $cart[$id]['quantity']++;
            } else {
                // Si no está, lo agregamos
                $cart[$id] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'image' => asset($product->image), // Asegúrate de usar asset() si la ruta es relativa
                ];
            }

            // Guardar el carrito actualizado en la sesión
            session()->put('cart', $cart);

            // Redirigir o devolver respuesta
            return redirect()->route('cart.index')->with('success', 'Producto añadido satisfactoriamente al carrito!');
        }

        public function removeFromCart($id)
        {
            // Obtener el carrito desde la sesión
            $cart = session()->get('cart', []);

            // Verificar si el producto existe en el carrito
            if (isset($cart[$id])) {
                // Eliminar el producto del carrito
                unset($cart[$id]);

                // Actualizar el carrito en la sesión
                session()->put('cart', $cart);

                // Redirigir con un mensaje de éxito
                return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
            }

            // Si no se encuentra el producto, redirigir de nuevo al carrito
            return redirect()->route('cart.index');
        }

        public function checkout()
        {
            // Obtener el carrito desde la sesión
            $cart = session()->get('cart', []);
    
            // Calcular el total
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
    
            return view('checkout', compact('cart', 'total'));
        }
    
        public function processCheckout(Request $request)
    {
        // Validar la dirección de entrega
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        // Obtener el carrito desde la sesión
        $cart = session()->get('cart', []);

        // Calcular el total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Crear la venta
        $sale = Sale::create([
            'user_id' => Auth::id(),
            'address' => $request->address,
            'phone' => $request->phone,
            'status' => 'pending',
            'total' => $total,
        ]);

        // Crear los items de la venta y actualizar el stock del producto
        foreach ($cart as $id => $item) {
            SaleItem::create([
                'sale_id' => $sale->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            // Actualizar el stock del producto
            $product = Product::find($id);
            $product->stock -= $item['quantity'];
            $product->save();
        }

        // Limpiar el carrito
        session()->forget('cart');

        // Redirigir con un mensaje de éxito
        return redirect()->route('cart.index')->with('success', 'Compra realizada con éxito!');
    }
}
