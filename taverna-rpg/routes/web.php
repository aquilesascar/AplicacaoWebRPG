<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroiController;
use App\Http\Controllers\MissaoController;

Route::get('/', function () {
    return view('home');
});

//cria automaticamente todas as rotas (index, store, update, destroy)
Route::resource('herois', HeroiController::class);
Route::resource('missoes', MissaoController::class);