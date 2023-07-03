<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\FoundItemController;

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
    return view('welcome');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

/*Route::middleware(['verified'])->group (function () {
    Fortify::loginView(function () {
        return view('auth.login');
    });*/

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

 // View Lost Items
 Route::get('/lost-items', [LostItemController::class, 'index'])->name('lost-items.index');

 // View Found Items
 Route::get('/found-items', [FoundItemController::class, 'index'])->name('found-items.index');

 // Post Lost Item
 Route::get('/lost-items/create', [LostItemController::class, 'create'])->name('lost-items.create');
 Route::post('/lost-items', [LostItemController::class, 'store'])->name('lost-items.store');


 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/posts', 'PostController@index');
});

require __DIR__.'/auth.php';
