<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KostController;

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

// Route Login
Route::get('/login', [LoginController::class, "index"]);

Route::post('/login', [LoginController::class, "auth"]);

// Route Register
Route::get('/register', [RegisterController::class, "index"]);

Route::post('/register', [RegisterController::class, "store"]);

// Route Home
Route::get('/', [KostController::class, "index"]);

// Route Owner
Route::get('/owner', [KostController::class, "ownerView"]);

// Route tambah kost
Route::get('/tambah-kost', [KostController::class, "tambahView"]);
Route::post('/tambah-kost', [KostController::class, "store"]);

// Route detail kost
Route::get('/detail/{id}', [KostController::class, "viewDetail"]);

// route edit kost
Route::get('/edit/{id}', [KostController::class, "editView"]);
Route::post('/edit/{id}', [KostController::class, "edit"]);



