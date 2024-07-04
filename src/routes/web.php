<?php

use GoingNext\LaravelStudio\Controllers\LaravelStudioController;
use Illuminate\Support\Facades\Route;

Route::get('laravel_studio', LaravelStudioController::class);

Route::post('createJsonFromDb', [LaravelStudioController::class, 'createJsonFromDb'])->name('createJsonFromDb');