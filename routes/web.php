<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminAccountController;





Route::middleware(['auth'])->group(function () {
    // User Dashboard
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');

    // Admin Routes
    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
        // Admin Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });
});

// User Authentication Routes
Route::prefix('')->group(function () {
    // User Login Routes
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/', [AuthController::class, 'login']);

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Registration Routes
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    // Admin Login Routes
    Route::get('/', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
    Route::post('/', [AuthController::class, 'adminLogin']);

    // Admin Logout Route
    Route::post('/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
});

Route::get('/admin/create', [AdminAccountController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminAccountController::class, 'store'])->name('admin.store');



// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// About Route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Shop Route
Route::get('/shop', function () {
    return view('shop');
})->name('shop');
Route::get('/shop', [ProductController::class, 'index'])->name('shop');


// Contact Route
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/save-contact', [ContactController::class, 'store'])->name('save_contact');


Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});
Route::middleware(['auth'])->post('/orders/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders');


// Orders Route 
Route::get('/admin.orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('orders.index');
Route::get('/success', [CheckoutController::class, 'successPage'])->name('success.page');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store');







// Search Routes 
Route::post('/search', [ProductController::class, 'search']);
Route::get('/search', [ProductController::class, 'showSearchForm'])->name('search');
Route::post('/search', [ProductController::class, 'search'])->name('search.results');
Route::post('/search-products', [ProductController::class, 'searchProducts'])->name('searchProducts');
Route::post('/search-products', [ProductController::class, 'search'])->name('searchProducts');
Route::post('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::post('/add-to-cart', [ProductController::class, 'addToCart'])->name('addToCart');











// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/cart/delete-all', [CartController::class, 'deleteAll'])->name('cart.deleteAll');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');





// Checkout Route (Assuming you are using CheckoutController)
Route::get('/checkout', [CheckoutController::class, 'show']);
Route::post('/checkout', [CheckoutController::class, 'placeOrder']);
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');



    
        // Admin Products
    
       
        Route::middleware('auth')->group(function () {
            // Routes for AdminProductController
            Route::get('/admin/products', 'AdminProductController@index')->name('admin.products.index');
            Route::post('/admin/products', 'AdminProductController@store')->name('admin.products.store');
            Route::put('/admin/products/{product}', 'AdminProductController@update')->name('admin.products.update');
            Route::delete('/admin/products/{product}', 'AdminProductController@destroy')->name('admin.products.destroy');
            Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
            Route::post('/admin/products', [App\Http\Controllers\AdminProductController::class, 'store'])->name('admin.products.store');
            Route::delete('/admin/products/{product}', [App\Http\Controllers\AdminProductController::class, 'destroy'])->name('admin.products.destroy');
            Route::get('/products', 'ProductController@index')->name('products.index');
            
        });
        



        Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
            Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
            Route::post('/orders/update', [AdminOrderController::class, 'update'])->name('admin.orders.update');
            Route::post('/admin/orders/update/{order}', [AdminOrderController::class, 'update'])->name('admin.orders.update');
            Route::get('/orders/delete/{id}', [AdminOrderController::class, 'delete'])->name('admin.orders.delete');
            Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');

        });


        //admin User
        Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users');
        Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.delete');


        //admin Contact
        Route::get('/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
        Route::get('/admin/contacts', [AdminContactController::class, 'index'])->name('admin.contacts');
        Route::get('contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
        Route::delete('contacts/{id}', [AdminContactController::class, 'delete'])->name('admin.contacts.delete');



