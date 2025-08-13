
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/catalogue', [ProductController::class, 'index'])->name('catalogue');
Route::get('/produit/{slug}', [ProductController::class, 'show'])->name('produit.show');

Route::get('/panier', [CartController::class, 'index'])->name('panier.index');
Route::post('/panier/ajouter/{id}', [CartController::class, 'add'])->name('panier.add');
Route::post('/panier/retirer/{id}', [CartController::class, 'remove'])->name('panier.remove');
Route::post('/panier/vide', [CartController::class, 'clear'])->name('panier.clear');

Route::get('/commande', [CheckoutController::class, 'index'])->name('commande.index');
Route::post('/commande', [CheckoutController::class, 'store'])->name('commande.store');

Route::view('/histoire', 'pages.histoire')->name('pages.histoire');
Route::view('/fabrication', 'pages.fabrication')->name('pages.fabrication');
Route::view('/engagements', 'pages.engagements')->name('pages.engagements');
Route::view('/faq', 'pages.faq')->name('pages.faq');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
