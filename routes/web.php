<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get('/loginadmin', [AuthController::class, 'login'])->name('loginadmin');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::post('/logoutadmin', [AuthController::class, 'logout'])->name('logoutadmin');

Route::prefix('/')->middleware(['auth', 'preventBackHistory'])->group(function () {
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

 //
 Route::get('/groups', [GroupController::class, 'index'])->name('group.index');
 Route::get('/create', [GroupController::class, 'create'])->name('group.create');
 Route::post('/store', [GroupController::class, 'store'])->name('group.store');
 Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
 Route::put('/update/{id}', [GroupController::class, 'update'])->name('group.update');
 Route::delete('destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');
 Route::get('group/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
 Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');

// oder
// oder 
Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
});



// Route::get('/', function () {
//     return view('admin.master');
// });

// Route::get('/sign-in', function () {
//     return view('admin.sign-in');
// });

// Route::get('/sign-up', function () {
//     return view('admin.sign-up');
// });

});










// ddnawg ky shop

Route::get('shop/register', [ShopController::class, 'register'])->name('shop.register');

Route::post('shop/checkRegister', [ShopController::class, 'checkRegister'])->name('shop.checkRegister');

// dang nhap  dang xuat shop
Route::get('/login-index', [ShopController::class, 'indexlogin'])->name('login.index');

Route::post('/login', [ShopController::class, 'checklogin'])->name('shop.checklogin');

Route::post('/logout', [ShopController::class, 'logout'])->name('shop.logout');

        


Route::get('/shop', [ShopController::class, 'shop'])->name('shop.layoutmaster');

Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('shop.detail');



//cart

Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');

Route::get('add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ShopController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ShopController::class, 'remove'])->name('remove.from.cart');

// checkout cart.

Route::get('/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');














