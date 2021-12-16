<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/invoices/totalPrice/{id}', [App\Http\Controllers\InvoiceController::class, 'totalPrice'])->name('invoices.totalprice');
Route::get('/invoices/idsByQuantity', [App\Http\Controllers\InvoiceController::class, 'idsByQuantity'])->name('invoices.idsbyquantity');
Route::get('invoices/namesByFinalValue', [App\Http\Controllers\InvoiceController::class, 'namesByFinalValue'])->name('invoices.namesbyfinalvalue');
Route::resource('invoices', App\Http\Controllers\InvoiceController::class);

Route::resource('products', App\Http\Controllers\ProductController::class);


Route::get('tasks/create', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
Route::post('tasks', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');

Route::group(['middleware' => ['auth:sanctum', 'verified'] ], function() {
    Route::get('tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/{task}', [App\Http\Controllers\TaskController::class, 'show'])->name('tasks.show');

    Route::post('logs', [App\Http\Controllers\LogsController::class, 'store'])->name('logs.store');
});