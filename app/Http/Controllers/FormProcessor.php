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



        return view('welcome_user', [
            'user' => [
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email']
            ]
        ]);
    }
}
