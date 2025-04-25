<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UsuariJWT;
use Illuminate\Support\Facades\Hash;
use App\Models\UsuariModel;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;


class ApiUsuariJWTController extends Controller
{
 
    public function creatoken(Request $request)
    {
        // Validació de dades d'entrada
        $request->validate([
            'correu' => 'required|email',
            'contrasenya' => 'required|string|min:8'
        ]);
    
        // Buscar l'usuari per correu
        $user = UsuariModel::where('email', $request->correu)->first();
    
        // Verificar credenciales
        if (!$user || !Hash::check($request->contrasenya, $user->contrasenya)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Credenciales incorrectas'
            ], 401);
        }
    
        try {
            // Generar el token
            $token = JWTAuth::fromUser($user); 
            
            // Guarda el usuaris_jwt
            UsuariJWT::create([
                'user_id' => $user->id,
                'token' => $token,
                'expira' => now()->addHours(config('jwt.ttl'))
            ]);
            // Retorna el token i la seva expiració
            return response()->json([
                'status' => 'success',
                'token' => $token,
                'expira' => now()->addHours(config('jwt.ttl'))->toDateTimeString()
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al generar el token',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    // Funcio per validar el token
    public function validaToken(Request $request){

        // Validació de dades d'entrada
        $request->validate([
            'token' => 'required|string'
        ]);

        // Buscar el token a la taula usuaris_jwt
        $token = UsuariJWT::where('token', $request->token)->first();

        // Verificar si el token existeix
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token no valid'
            ], 401);
        }

        // Validar si el token ha caducat
        if ($token->expira < now()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token caducat'
            ], 401);
        }

        try {
            // Verificar el token JWT
            $user = JWTAuth::setToken($request->token)->authenticate();
            
            // Si el token no és vàlid, retorna un error
            if (!$user) {
                $response['message'] = 'Token invalid';
                return response()->json($response, 200);
            }
    
        // Si el token és vàlid, retorna un missatge d'èxit
        return response()->json([
            'status' => 'success',
            'message' => 'Token valid, ja pots fer peticions',
        ]);

    } catch (\Exception $e) {
        $response['message'] = 'Error al procesa el token';
        return response()->json($response, 200);
    }
}
}