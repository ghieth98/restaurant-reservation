<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Frontend\WelcomeController;
use Illuminate\Support\Facades\Route;

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

//FRONTEND ROUTING
Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/categories', [\App\Http\Controllers\Frontend\CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('/categories/{id}', [\App\Http\Controllers\Frontend\CategoryController::class, 'show'])
    ->name('categories.show');
Route::get('/menus', [\App\Http\Controllers\Frontend\MenuController::class, 'index'])
    ->name('menus.index');


//BACKEND ROUTING
Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('categories', CategoryController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('reservations', ReservationController::class);
    Route::resource('tables', TableController::class);
    //Media Routing
    Route::post('/media/{model}/{id}/upload', [MediaController::class, 'upload'])
        ->name('media.upload');
    Route::get('/media/{model}/{id}/download', [MediaController::class, 'download'])
        ->name('media.download');
    Route::delete('/media/{model}/{id}/delete', [MediaController::class, 'destroy'])
        ->name('media.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
