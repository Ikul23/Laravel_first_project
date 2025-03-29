<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FormProcessor;
use App\Http\Controllers\HomeController;
use App\Models\Employee;

// Группа для аутентифицированных пользователей
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Группа статических страниц
Route::name('pages.')->group(function () {
    Route::get('/', function () {
        return view('home', [
            'user' => [
                'name' => 'Igor Kuleshov',
                'age' => 40,
                'position' => 'Fullstack Developer',
                'location' => 'Moscow',
                'skills' => ['PHP', 'Laravel', 'JavaScript']
            ],
            'contact_info' => [
                'address' => 'Moscow, Russia',
                'post_code' => '123456',
                'email' => 'contact@example.com',
                'phone' => '+7 (123) 456-78-90',
            ]
        ]);
    })->name('home');

    Route::get('/contacts', function () {
        return view('contacts', [
            'contact_info' => [
                'address' => 'Moscow, Russia',
                'post_code' => '123456',
                'email' => 'contact@example.com',
                'phone' => '+7 (123) 456-78-90',
                'social_links' => [
                    'github' => 'https://github.com/username'
                ]
            ]
        ]);
    })->name('contacts');
}); // <- Закрывающая скобка для группы pages

// Группа для работы с формами
Route::controller(FormProcessor::class)->group(function () {
    Route::get('/userform', 'index')->name('userform');
    Route::post('/userform', 'store')->name('userform.store');
    Route::get('/form', 'index')->name('form.show');
    Route::post('/store_form', 'store')->name('form.store');
});

// API-эндпоинты
Route::prefix('api')->group(function () {
    Route::get('/employees', function () {
        return response()->json([
            'data' => Employee::all(),
            'meta' => [
                'count' => Employee::count(),
                'timestamp' => now()->toDateTimeString()
            ]
        ]);
    })->name('api.employees');
});

// Аутентификация
Auth::routes();

// Fallback route
Route::fallback(function () {
    return redirect()->route('pages.home');
});
