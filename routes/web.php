<?php

use App\Http\Controllers\FormProcessor;
use Illuminate\Support\Facades\Route;

// Показ формы (GET)
Route::get('/userform', [FormProcessor::class, 'index']);

// Обработка формы (POST)
Route::post('/store_form', [FormProcessor::class, 'store'])->name('form.store');
