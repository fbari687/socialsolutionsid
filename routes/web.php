<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Models\Package;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);

route::middleware(['auth', 'only_admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/add-user', [DashboardController::class, 'create'])->name('add-user');
    Route::put('/edit-user/{slug}', [DashboardController::class, 'update']);
    Route::delete('/delete-user/{slug}', [DashboardController::class, 'delete']);


    Route::delete('/delete-package/{slug}', [PackageController::class, 'delete']);
    Route::get('/add-package', [PackageController::class, 'add']);
    Route::post('/add-package', [PackageController::class, 'create'])->name('add-package');
    Route::get('/package', [PackageController::class, 'package']);


    Route::get('/faqs', [FaqController::class, 'index']);
    Route::get('/faq/{slug}', [FaqController::class, 'show'])->name('category.show');
    Route::post('/faq-edit/{slug}', [FaqController::class, 'update'])->name('category-edit');
    Route::post('/add-faq', [FaqController::class, 'create'])->name('category-add');

    Route::delete('/faq-destroy/{slug}', [FaqController::class, 'destroy'])->name('category-destroy');
});



route::middleware('guest')->group(function () {

    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerProcess']);

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
});

route::middleware('auth')->group(function () {

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/payment/{slug}', [CartController::class, 'view']);
    Route::delete('/payment-package/{slug}', [CartController::class, 'payment']);


    Route::post('/addToCart', [CartController::class, 'addCart']);
    Route::delete('/deleteFromCart/{slug}', [CartController::class, 'deleteFromCart']);
});
