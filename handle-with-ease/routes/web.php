<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Routing;

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

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/about', function () {
//     return view('about');
// });
// Route::get('/Service', function () {
//     return view('Our_Service');
// });
// Route::get('/team', function () {
//     return view('our_team');
// });
// Route::get('/gallery', function () {
//     return view('our_gallery');
// });
// Route::get('/blog', function () {
//     return view('blogs');
// });

Route::get('/', [App\Http\Controllers\Routing::class, 'root']);
Route::get('{any}', [App\Http\Controllers\Routing::class, 'index']);