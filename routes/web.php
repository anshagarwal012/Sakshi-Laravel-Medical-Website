<?php

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

Route::get('/', [App\Http\Controllers\Routing::class, 'root']);
Route::get('{any}', [App\Http\Controllers\Routing::class, 'index']);
Route::get('admin/{page}', [App\Http\Controllers\Backend::class, 'index']);
Route::post('admin/{page}', [App\Http\Controllers\Backend::class, 'post_']);