<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',HomeController::class . '@index')->name('home');
Route::get('/home', HomeController::class . '@index')->name('home');
Route::get('/contact', HomeController::class . '@contact')->name('contact');
Route::get('/store/{id}', HomeController::class . '@store_page');

Route::get('/login', HomeController::class . '@login')->name('auth.login');
Route::get('/register', HomeController::class . '@register')->name('auth.register');
Route::post('/register/save', LoginController::class . '@registerSave')->name('auth.save');
Route::post('/login/check', LoginController::class . '@authenticate')->name('auth.check');
Route::get('/logout', LoginController::class . '@logout')->name('auth.logout');

// Route::get('/user/{id}', UserController::class . '@publicUserInfo')->name('user.public.info');
Route::get('/user', UserController::class . '@userInfo')->name('user.info');
Route::post('/user/update', UserController::class . '@updateInfo')->name('user.info.update');
Route::get('/user/address/', AddressController::class . '@userAddress')->name('user.address');
Route::post('/user/address/save', AddressController::class . '@saveAddress')->name('user.address.save');
Route::post('/user/address/remove', AddressController::class . '@removeAddress')->name('user.address.remove');

Route::get('/cart', CartController::class . '@viewCart')->name('cart.view');
Route::get('/cart/add/{id}', CartController::class . '@addCart')->name('cart.add');
Route::post('/cart/update/{id}', CartController::class . '@updateQuantity')->name('cart.update');
Route::get('/checkout', CartController::class . '@checkout')->name('cart.checkout');
Route::post('/checkout/order', OrderController::class . '@makeOrder')->name('cart.order');

Route::get('/favorite', FavoriteController::class . '@viewFavorite')->name('favorite.view');
Route::get('/favorite/{id}', FavoriteController::class . '@addFavorite')->name('favorite.add');
Route::post('/favorite/remove/{id}', FavoriteController::class . '@removeFavorite')->name('favorite.remove');

Route::get('/notice', HomeController::class . '@noticePage')->name('notice.view');

Route::get('/search', SearchController::class . '@search')->name('search');

Route::get('/admin', AdminController::class . '@dashboard')->name('admin.dashboard');
Route::get('/admin/food', AdminController::class . '@foodPage')->name('admin.food');
Route::get('/admin/food/add', AdminController::class . '@foodAddView')->name('admin.food.add.view');
Route::post('/admin/food/add', AdminController::class . '@foodAdd')->name('admin.food.add');
Route::get('/admin/food/category', AdminController::class . '@categoryPage')->name('admin.food.category');
Route::post('/admin/food/category/add', AdminController::class . '@addCategory')->name('admin.food.category.add');
Route::get('/admin/food/{id}', AdminController::class . '@foodEdit')->name('admin.food.edit');
Route::post('/admin/food/update/{id}', AdminController::class . '@foodUpdate')->name('admin.food.edit.update');

Route::get('/admin/order', AdminController::class . '@orderPage')->name('admin.order');
Route::get('/admin/order/{id}', AdminController::class . '@orderInfo')->name('admin.order.info');
// Route::post('/admin/order/success/{id}', AdminController::class . '@orderAccept')->name('admin.order.accept');
Route::post('/admin/order/success', AdminController::class . '@orderAccept')->name('admin.order.accept');

Route::get('/admin/bill', AdminController::class . '@billPage')->name('admin.bill');
Route::get('/admin/bill/search', AdminController::class . '@searchPage')->name('admin.bill.search');
Route::get('/admin/bill/{id}', AdminController::class . '@billInfo')->name('admin.bill.info');
