<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\UsuariModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegistrarseController extends Controller
{
    //Funcio per mostrar la pantalla de registrarse
    public function mostrarRegistrarse()
    {
        return view('registrarse');
    }

    //Funcio per registrar-se
    public function registrarse(Request $request)
{
    // Validació de les dades d'entrada
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'cognom' => 'required|string|max:255',
        'nickname' => 'required|string|unique:usuaris,nickname|max:255',
        'dni' => 'required|string|unique:usuaris,dni|max:20',
        'email' => 'required|email|unique:usuaris,email|max:255',
        'contrasenya' => 'required|string|min:8|confirmed',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    //Caregat la imatge
    $imagePath = $request->file('photo')->store('images', 'public');

    // Crea l'usuari
    $user = UsuariModel::create([
        'nom' => $validated['nom'],
        'cognom' => $validated['cognom'],
        'nickname' => $validated['nickname'],
        'dni' => $validated['dni'],
        'email' => $validated['email'],
        'contrasenya' => Hash::make($validated['contrasenya']),
        'photo' => $imagePath,
        'admin' => false
    ]);


    // Inicia sessio automaticament
    Auth::login($user);

    // Redirigeix a la vista d'index amb un missatge de confirmació
    return redirect()->route('indexsession')->with('success', '¡Registrat amb exit!');
}
}
