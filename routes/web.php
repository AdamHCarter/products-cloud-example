<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;

// livewire search
Route::get('/products/search', function () {
    return view('products.search');
})->name('products.search');

Route::resource('products', ProductController::class)->only('index', 'show');

// Route::get('/products', function () {
//     $products = Product::all();
//     return view('products', ['products'=> $products]);
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Required to be authenticated to access
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes. prefix for url admin/. name for route name usage in route helper, ie. admin.products.index    
    Route::prefix('admin')->name('admin.')->group(function () {
        //separate router so public can just be index and show, while this has full CRUD
        Route::resource('products', AdminProductController::class)->middleware('can:accessAdmin,App\Models\Product'); // admin only, shows 403 if not
    });
});

require __DIR__ . '/auth.php';
