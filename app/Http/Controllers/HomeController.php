<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Product::take(6)->get();
        $news = [
            ['title' => 'Nouveau Nectar Mangue', 'date' => '2025-07-20'],
            ['title' => 'Partenariat avec des salons de thé', 'date' => '2025-08-01'],
        ];
        return view('home', compact('featured','news'));
    }
}