<?php

use App\Http\Controllers\Api\AdresseController;
use App\Http\Controllers\Api\CategorieAdresseController;
use App\Http\Controllers\Api\NatureAdresseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::apiResource('nature-adresse', NatureAdresseController::class);
Route::apiResource('categorie-adresse', CategorieAdresseController::class);
Route::apiResource('adresse', AdresseController::class);
