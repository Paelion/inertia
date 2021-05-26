<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
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
        'canLogin'       => Route::has('login'),
        'canRegister'    => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/blog', [BlogController::class, "index"])->name('blog.index');
    Route::get('/blog/create', [BlogController::class, "create"])->name('blog.create');
    Route::get('/blog/{id}/edit', [BlogController::class, "edit"])->name('blog.edit');

    Route::put('/blog/{id}', [BlogController::class, "update"])->name('blog.update');
    Route::post('/blog', [BlogController::class, "store"])->name('blog.store');

    Route::get('/blog/{id}/toggle', [BlogController::class, 'toggle'])->name('blog.toggle');


    // CLIENT

    Route::get('/client', [ClientController::class, "index"])->name('client.index');
    Route::get('/client/create', [ClientController::class, "create"])->name('client.create');
    Route::get('/client/{id}/edit', [ClientController::class, "edit"])->name('client.edit');

    Route::put('/client/{id}', [ClientController::class, "update"])->name('client.update');
    Route::post('/client', [ClientController::class, "store"])->name('client.store');
    Route::delete('/client/{id}', [ClientController::class, "delete"])->name('client.delete');

});
