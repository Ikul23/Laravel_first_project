<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormProcessor;
use App\Models\Employee;

// Показ формы (GET)
Route::get('/userform', [FormProcessor::class, 'index']);

// Обработка формы (POST)
Route::post('/store_form', [FormProcessor::class, 'store'])->name('form.store');

// Тест работы с БД
Route::get('/test_employees', function () {
    $employees = App\Models\Employee::all();
    return response()->json($employees);
});
