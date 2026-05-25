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
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [UserController::class, 'submitContactForm'])->name('contact.submit');
Route::get('/logout', function(){
    Auth::logout();
    return redirect()->route('dashboard');
})->name('logout');
Route::delete('/profile/delete/{id}', [UserController::class, 'deleteAccount'])->name('user.deleteAccount');

Route::middleware(['auth','prevent-back'])->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('/finished', [OrderController::class, 'showFinished'])->name('finished');
    Route::get('/finished/{id}', [UserController::class, 'detailsFinished'])->name('finished.details');
    Route::get('/progress', [OrderController::class, 'showprogress'])->name('progress');
    Route::get('/progress/{id}', [UserController::class, 'detailProgress'])->name('progress.details');
    Route::get('/order', [OrderController::class, 'placeOrder'])->name('user.order');
    Route::post('/order', [OrderController::class, 'submitOrder'])->name('user.order.submit');
    Route::get('/drafts', [OrderController::class, 'showDrafts'])->name('user.drafts');
    Route::delete('/drafts/{id}', [OrderController::class, 'deleteDraft'])->name('user.drafts.delete');
    Route::get('/editDraft/{id}', [OrderController::class, 'editDraft'])->name('user.drafts.edit');
    Route::put('/editDraft/{id}', [OrderController::class, 'updateDraft'])->name('user.draft.update');
    Route::put('/checkoutDraft/{id}', [OrderController::class, 'submitDraft'])->name('user.drafts.checkout');
});
Route::middleware(['admin','prevent-back'])->prefix('admin')->group(function () {
    // Route::get('/productsCreate', [AdminController::class, 'createProduct'])->name('admin.product.create');
    // Route::post('/productsCreate', [AdminController::class, 'storeProduct'])->name('admin.product.store');

    Route::get('/profile', [UserController::class, 'showProfile'])->name('admin.profile');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('admin.profile.update');
    // Route::put('/profile', [UserController::class, 'updateProfile'])->name('admin.profile.update');

    Route::get('/dashboard', [UserController::class, 'goDashboard'])->name('admin.dashboard');
    Route::get('/details-progress/{id}', [AdminController::class, 'onProgress'])->name('admin.details.progress');
    Route::put('/progress/{id}/finish', [AdminController::class, 'finishButton'])->name('admin.progress.finish');
    Route::post('/details-progress/add/{id}', [OrderController::class, 'addTasklist'])->name('admin.add.tasklist');
    Route::put('/details-progress/update/{id}', [OrderController::class, 'updateTasklists'])->name('admin.update.tasklist');
    Route::delete('/details-progress/delete/{id}', [OrderController::class, 'deleteTasklist'])->name('admin.delete.tasklist');
    Route::get('/details-finish/{id}', [AdminController::class, 'Finished'])->name('admin.details.finished');

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




