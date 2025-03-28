<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormProcessor extends Controller
{
    // Показ формы
    public function index()
    {
        return view('userform');
    }

    // Обработка данных формы
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255'
        ]);

        // Здесь можно добавить сохранение в БД
        // Например: User::create($validated);

        return response()->json([
            'success' => true,
            'data' => $validated,
            'message' => 'Form submitted successfully!'
        ]);
    }
}
