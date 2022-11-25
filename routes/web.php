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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/rookmelding', [App\Http\Controllers\RookmeldingController::class, 'index'])->name('rookmelding');
Route::get('/beweging', [App\Http\Controllers\BewegingController::class, 'index'])->name('beweging');
Route::get('/ramen', [App\Http\Controllers\RamenController::class, 'index'])->name('ramen');
