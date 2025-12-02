<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/signup', [UserController::class, 'registration'])->name('register');

Route::post('login', [UserController::class, 'logincheck'])->name('logincheck');
Route::post('signup', [UserController::class, 'registerCheck'])->name('registercheck');
Route::get('/',[UserController::class, 'goDashboard'])->name('dashboard');
Route::get('/logout', function(){
    Auth::logout();
    return redirect()->route('dashboard');
})->name('logout');
Route::delete('/profile/delete/{id}', [UserController::class, 'deleteAccount'])->name('user.deleteAccount');

Route::middleware(['auth','prevent-back'])->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('/finished', [UserController::class, 'finished'])->name('finished');
    Route::get('/progress', [UserController::class, 'progress'])->name('progress');
    Route::get('/order', [OrderController::class, 'countryCodes'])->name('user.order');
});
Route::middleware(['admin','prevent-back'])->prefix('admin')->group(function () {
    // Route::get('/productsCreate', [AdminController::class, 'createProduct'])->name('admin.product.create');
    // Route::post('/productsCreate', [AdminController::class, 'storeProduct'])->name('admin.product.store');

    Route::get('/profile', [UserController::class, 'showProfile'])->name('admin.profile');
    // Route::put('/profile', [UserController::class, 'updateProfile'])->name('admin.profile.update');

    Route::get('/dashboard', [UserController::class, 'goDashboard'])->name('admin.dashboard');

    // Route::get('/category', [AdminController::class, 'showCategory'])->name('admin.product');
    // Route::get('/productsCreate/{id}', [AdminController::class, 'editProduct'])->name('admin.product.edit');

    // Route::put('/productsCreate/{id}', [AdminController::class, 'updateProduct'])->name('admin.product.update');


    // Route::delete('/category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.product.delete');

    Route::get('/portfolio', [AdminController::class, 'portfolio'])->name('admin.portfolio');

    // PRODUCTS
    Route::get('/products', [AdminController::class, 'showProducts'])->name('admin.products');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    // Route::post('/products', function() {dd('ROUTE STORE DIPANGGIL');});

    Route::get('/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('/products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/products/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');
});




