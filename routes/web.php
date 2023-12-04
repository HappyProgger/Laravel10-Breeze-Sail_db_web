<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
//
//Route::get('/clients', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});






Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



#clients

Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientsController::class, 'store'])->name('clients.store');
Route::get('/clients/{id}', [ClientsController::class, 'show'])->name('clients.show');
Route::get('/clients/{id}/edit', [ClientsController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{id}', [ClientsController::class, 'update'])->name('clients.update');
Route::delete('/clients/{id}', [ClientsController::class, 'destroy'])->name('clients.destroy');



Route::post('/clients/store_client_cars', [CarController::class, 'store'])->name('cars.store_client_car');
Route::put('/clients/update_client_cars', [CarController::class, 'update'])->name('cars.update_client_car');
Route::delete('/clients/delete_client_cars/{id}', [CarController::class, 'delete'])->name('cars.delete_client_car');
Route::put('/clients/change_status_client_cars/{id}', [CarController::class, 'change_status_client_cars'])->name('cars.change_status_client_cars');
require __DIR__.'/auth.php';
