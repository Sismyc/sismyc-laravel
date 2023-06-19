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

Route::get('/', function () {
    return 'Unauthorized.';
});

Route::get('/descarga.zip', function () {
    return redirect('storage/sisrmyc.zip');
});

Route::get('/descarga', function () {
    return redirect('storage/sisrmyc.exe');
});
