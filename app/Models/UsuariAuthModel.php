<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UsuariAuthModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuari_auth'; 
    protected $fillable = [
        'name',
        'email',
        'google_id',
        'avatar',
    ];

    protected $hidden = [
        'remember_token', 
    ];

    protected $casts = [
        'email_verified_at' => 'datetime', 
    ];

    public static function findOrCreateUser($socialUser)
{
    return UsuariAuthModel::firstOrCreate(
        ['email' => $socialUser->email],
        [
            'name' => $socialUser->name,
            'google_id' => $socialUser->id,
            'avatar' => $socialUser->avatar,
            'email_verified_at' => now()
        ]
    );
}
}

