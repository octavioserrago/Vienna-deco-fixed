<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $footerNavs = [
            ['name' => 'Inicio', 'href' => '/'],
            ['name' => 'Catalogo', 'href' => '/catalogo'],
        ];

        return view('welcome', compact('footerNavs'));
    }
}