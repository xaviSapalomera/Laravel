<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use App\Models\UsuariAuthModel;
use App\Models\UsuariModel;
use App\Models\UsuarioAuth; 

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    
    // Mostra formulari de login
public function mostrarLogin(){
        return view('login');
}
 
// Funcio per validar el login
public function login(Request $request){


    try{    
        // Conta intents fallits
        $intentsFallits = Session::get('intents_fallits', 0);
    
        // Valida les dades de la request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            
            'g-recaptcha-response' => $intentsFallits >= 3 ? 'required|captcha' : '',
        ]);
    
        // Verificar si el email existeix
        $user = UsuariModel::where('email', $request->email)->first();
    
        // Si exsisteix, verificar la contrasenya
        if ($user && Hash::check($request->password, $user->contrasenya)) {
           
            // Posar a 0 els intents fallits
            Session::put('intents_fallits', 0);
    
            // Remember me i login
            $remember = $request->has('remember');
            Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember);
            

            // Redirigir a la ruta desitjada
            return redirect()->intended('indexsession');
        }
    
        // Si falla el login, aumenta els intents
        Session::put('intents_fallits', $intentsFallits + 1);
    
        // Si el login falla, redirigir a la vista de login amb un missatge d'error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }
        catch (\Exception $e) {
            Log::error('Error en el proceso de login', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
    
            return back()->withErrors([
                'email' => 'Error en el proceso de login. Inténtalo de nuevo más tarde.',
            ]);
        }
    }



// Funció per tanca sesió
public function logout()
{
    Auth::logout(); 

    Session::flush(); 

    Cookie::queue(Cookie::forget('correu')); 

    return redirect()->route('index');
}

    
    
    
// Funcio per redirigir al usuari a Google
public function redirectToGoogle(){
        
        // Configuracio del fitxer de cacert.pem perque no falli en la connexio i no doni error
        $client = new Client([
            'verify' => 'C:\laragon\bin\php\php-8.3.16-Win32-vs16-x64\extras\ssl\cacert.pem',
            'timeout' => 30,
            'connect_timeout' => 10,
            'http_errors' => false
        ]);
        
        // Configuració Socialite
        config(['socialite.google.guzzle' => ['verify' => $client->getConfig('verify')]]);
        
        // Redirigir a Google per autenticar-se
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {
            // Configuracio del fitxer de cacert.pem perque no falli en la connexio i no doni error
            $client = new Client([
                'verify' => 'C:\laragon\bin\php\php-8.3.16-Win32-vs16-x64\extras\ssl\cacert.pem',
                'timeout' => 30
            ]);
            
            // Configuració Socialite
            config(['socialite.google.guzzle' => ['verify' => $client->getConfig('verify')]]);
            
            $googleUser = Socialite::driver('google')->user();
            
            // .crear o actualitza l'usuari a la base de dades
            $user = UsuariAuthModel::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => Hash::make(Str::random(24)),
                    'email_verified_at' => now()
                ]
            );

            // Logea l'usuari
            Auth::login($user, true);
            
            // Redirigir al indexsession si ha sortit be
            return redirect()->intended('/indexsession');

        } catch (\Exception $e) {
            Log::error('Error en autenticación Google', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            

             // Si el login falla, redirigir a la vista de login amb un missatge d'error
            return redirect('/login')
                ->with('error', 'Error al autenticar con Google: '.$e->getMessage());
        }
    }

}


    
    
    
    