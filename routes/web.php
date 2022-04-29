<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('role', [RoleController::class, 'index'])->name('role');
    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::get('item', [ItemController::class, 'index'])->name('item');
    Route::post('item', [ItemController::class, 'store'])->name('item.save');
    Route::inertia('item/create', 'CreateItem');
    // recieved
    Route::get('received', [StockController::class, 'received'])->name('received');
    Route::get('received/create', [StockController::class, 'receivedCreate'])->name('received.create');
    Route::post('received', [StockController::class, 'receivedStore'])->name('received.store');
    // issued
    Route::get('requisition', [StockController::class, 'requisition'])->name('requisition');
    Route::get('requisition/create', [StockController::class, 'requisitionCreate'])->name('requisition.create');
    Route::post('requisition', [StockController::class, 'requisitionStore'])->name('requisition.store');
});
