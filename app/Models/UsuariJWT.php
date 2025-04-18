<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UsuariJWT extends Model
{
    protected $table = 'usuaris_jwt';
    protected $fillable = ['id', 'user_id', 'token', 'expira'];

    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo(UsuariModel::class);
    }
    public function getJWTCustomClaims() {
        return [];
    }
}