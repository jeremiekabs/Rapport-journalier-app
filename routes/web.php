<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProduitController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\VenteController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::prefix('visite')->group(function () {
        Route::get('/', [VisiteController::class, 'index'])->name('visite.index');
        Route::get('/create', [VisiteController::class, 'create'])->name('visite.create');
        Route::post('/create', [VisiteController::class, 'store'])->name('visite.store');
        Route::get('/edit/{visite}', [VisiteController::class, 'edit'])->name('visite.edit');
        Route::put('/edit/{visite}', [VisiteController::class, 'update'])->name('visite.update');
        Route::get('/show/{visite}', [VisiteController::class, 'show'])->name('visite.show');
        Route::delete('/delete/{visite}', [VisiteController::class, 'destroy'])->name('visite.destroy');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('users')->group(function () {
        Route::get('/', [AuthController::class, 'index'])->name('user.index');
        Route::get('/edit/{id}', [AuthController::class, 'edit'])->name('user.edit');
        Route::put('/edit/{id}', [AuthController::class, 'update'])->name('user.update');
    });

    Route::get('/count-today-visits', [VisiteController::class, 'countTodayVisits'])->name('count.today.visits');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/count-today-visits', [DashboardController::class, 'countTodayVisits'])->name('count.today.visits');
    Route::get('/count-total-visits', [DashboardController::class, 'countTotalVisits'])->name('count.total.visits');
    Route::get('/get-visite-stats', [DashboardController::class, 'getVisiteStats'])->name('get.visite.stats');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'handleRegister'])->name('handleRegister');
});




Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index'); 
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');


Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('produits.update');
Route::delete('/produits/{produit}', [ProduitController::class, 'destroy'])->name('produits.destroy');
Route::get('/produits/{produit}', [ProduitController::class, 'show'])->name('produits.show');


Route::get('/dashboard', [DashboardProduitController::class, 'index'])->name('dashboardProduit');

Route::get('/vente', [VenteController::class, 'create'])->name('vente.create');
Route::post('/vente', [VenteController::class, 'vendre'])->name('vente.vendre');