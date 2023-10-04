<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// categorie routes
// thung rac

Route::put('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('categories.softdeletes');

Route::get('category/trash', [CategoryController::class, 'trash'])->name('categories.trash');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::put('category/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('categories.restoredelete');

Route::get('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');

Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');



//  products

Route::put('product /softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('products.softdeletes');

Route::put('product/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('products.restoredelete');


Route::get('products/trash', [ProductController::class, 'trash'])->name('products.trash');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');

Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/', function () {
    return view('admin.master');
});

Route::get('/sign-in', function () {
    return view('admin.sign-in');
});

Route::get('/sign-up', function () {
    return view('admin.sign-up');
});

// Route::get('/shop', function () {
//     return view('shop.home');
// });

// Route::get('/cart', function () {
//     return view('shop.cart');
// });


// ddnawg ky shop

Route::get('shop/register', [ShopController::class, 'register'])->name('shop.register');

Route::post('shop/checkRegister', [ShopController::class, 'checkRegister'])->name('shop.checkRegister');

// dang nhap shop
Route::get('/login-index', [ShopController::class, 'indexlogin'])->name('login.index');

Route::post('/login', [ShopController::class, 'checklogin'])->name('shop.checklogin');



Route::get('/shop', [ShopController::class, 'shop'])->name('shop.layoutmaster');

Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('shop.detail');



//cart

Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');

Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove.from.cart');












