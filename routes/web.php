<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
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

/* Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
}); */

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('conversations');


Route::controller(UserController::class)->group(function () {

    Route::get('/users/filter',  'getUsers')
        ->middleware(['auth', 'verified'])
        ->name('users.filter');


    Route::get('/users',  'index')
        ->middleware(['auth', 'verified'])
        ->name('users');

    Route::post('user/inactivate/{user}', 'inactivateUser')
        ->middleware(['auth', 'verified'])
        ->name('user.inactivate');

    Route::post('user/activate/{id}','activateUser')
        ->middleware(['auth', 'verified'])
        ->name('user.activate');
});
require __DIR__.'/auth.php';
