<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\RekomendasiController;

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
Route::get('/login', [UserController::class, "loginView"])->name('login');
Route::post('/login', [UserController::class, "autentikasi"]);

// Route Register
Route::get('/register', [UserController::class, "registerView"]);
Route::post('/register', [UserController::class, "registerUser"]);

// Route Logout
Route::post('/logout', [UserController::class, "logout"]);


// Route Home
Route::get('/', [KostController::class, "homeView"])->middleware('auth');

// Route Owner
Route::get('/owner', [KostController::class, "ownerView"])->middleware('auth');

// Route tambah kost
Route::get('/tambah-kost', [KostController::class, "tambahView"])->middleware('auth');
Route::post('/tambah-kost', [KostController::class, "tambahKost"]);

// Route detail kost
Route::get('/detail/{id}', [KostController::class, "detailView"])->middleware('auth');
Route::post('/detail/{id}', [FavoritController::class, "addFavorit"]);

// route edit kost
Route::get('/edit/{id}', [KostController::class, "editView"])->middleware('auth');
Route::post('/edit/{id}', [KostController::class, "editKost"]);

// route hapus kost
Route::get('/hapus-kost/{id}', [KostController::class, "hapusView"])->middleware('auth');
Route::delete('/hapus-kost/{id}', [KostController::class, "hapusKost"]);


// Route Edit Profile
Route::get('/edit-profile/{id}', [UserController::class, "editProfileView"])->middleware('auth');
Route::put('/edit-profile/{id}', [UserController::class, "editProfile"]);

// Route favorit
Route::get('/favorit', [FavoritController::class, "favoritView"])->middleware('auth');
Route::delete('/favorit/hapus/{id}', [FavoritController::class, "deleteFavorit"]);

// Route pencarian/rekomendasi
Route::get('/hasil-rekomendasi', [RekomendasiController::class, "rekomendasiView"])->middleware('auth');
Route::post('/hasil-rekomendasi', [RekomendasiController::class, "cariKost"]);

