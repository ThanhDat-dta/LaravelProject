<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/auth', [AuthManager::class, 'auth'])->name('auth');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');

Route::get('/menu/{category}', [FoodController::class, 'showCategory'])->name('menu.category');

Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/search', function (Request $request) {
    $query = $request->input('query');

    $results = DB::table('menu')
        ->where('name', 'LIKE', "%{$query}%")
        ->get();

    return response()->json($results);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/count', [CartController::class, 'getItemCount'])->name('cart.count');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('/order-history', [OrderController::class, 'orderHistory'])->name('order.history');
    Route::get('/order/{id}', [OrderController::class, 'showOrder'])->name('order.show');
    Route::post('/order/add-to-cart/{id}', [OrderController::class, 'addToCart'])->name('order.addToCart');
    Route::post('/order/buy-now', [OrderController::class, 'buyNow'])->name('order.buyNow');
    Route::post('/order/{id}/review', [OrderController::class, 'storeReview'])->name('order.storeReview');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::patch('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('/admin/products/statistics', [ProductController::class, 'statistics'])->name('admin.products.statistics');

    Route::get('/admin/dashboard_admin', [DashboardController::class, 'index'])->name('admin.dashboard_admin');

    Route::get('/admin/reviews', [ReviewController::class, 'index'])->name('admin.reviews.index');
    Route::delete('/admin.reviews/{id}', [ReviewController::class, 'destroy'])->name('admin.reviews.destroy');
    Route::post('/admin.reviews/{id}/reply', [ReviewController::class, 'reply'])->name('admin.reviews.reply');

    Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings');
    Route::patch('/admin/settings', [SettingsController::class, 'update'])->name('admin.settings.update');
});