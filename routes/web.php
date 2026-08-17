<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/teste', [TestController::class, 'index'])->name('teste.index');
Route::get('/teste/gerar', [TestController::class, 'seed']);

# Route::get('/', function () {
   # return view('welcome');
#});
