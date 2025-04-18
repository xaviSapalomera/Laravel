<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;


class UsuariModel extends Authenticatable implements JWTSubject
{
    protected $table = 'usuaris';
    protected $fillable = [
        'nom', 'cognom', 'nickname', 'dni', 'email', 'contrasenya', 'photo','admin'
    ];
    protected $attributes = [
        'admin' => false
    ];
    protected $hidden = ['contrasenya', 'remember_token'];
    
    public function getAuthPassword()
    {
        return $this->contrasenya; 
    }
    // Funcio per a obtenir el JWT
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims() {
        return [];
    }
    public static function obtenirUsuariPerEmail(string $email): ?UsuariModel
    {
        try {
            return self::where('email', $email)->first();
        } catch (\Exception $e) {
            Log::error("Error al obtenir usuari per email: " . $e->getMessage());
            return null;
        }
    }
    //Funcio per obtenir Usuaris per ID
    public static function filtrarUsuarisPerID($id){
        try {
            return self::where('id', $id)->first();
        } catch (\Exception $e) {
            Log::error("Error al obtenir usuari per ID: " . $e->getMessage());
            return null;
        }
    }

    // Funcio per validar la contrasenya
    public static function validarPassword($password, $userPassword)
    {
        return Hash::check($password, $userPassword);
    }

}

