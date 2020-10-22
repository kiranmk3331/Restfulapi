<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Buyers

Route::resource('buyers', 'BuyerController', ['only' => ['index', 'show']]);

// Category

Route::resource('categories', 'CategoryController', ['except' => ['create', 'edit']]);

// Product

Route::resource('products', 'ProductController', ['only' => ['index', 'show']]);

// Sellers

Route::resource('sellers', 'SellerController', ['only' => ['index', 'show']]);

// Transaction 

Route::resource('transactions', 'TransactionController', ['only' => ['index', 'show']]);

// Users

Route::resource('users', 'UserController', ['except' => ['create', 'edit']]);