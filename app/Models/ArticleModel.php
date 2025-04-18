<?php

namespace App\Models;

use InvalidArgumentException;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class ArticleModel extends Model{

    protected $table = 'articles';

    protected $fillable = [
        'titol',
        'cos',
        'data',
        'user_id',
        'image_path'
    ];

    public $timestamps = false;

    public function actualitzarArticle($titol, $cos, $id) {
        try {

            $articleID = self::find($id);

            if ($articleID) {
                $articleID->$cos = $titol;
                $articleID->save();
                return true;
            }else{
                return false;
            }
        } catch (\Exception $e) {
            error_log("Error al actualitzar nickname: " . $e->getMessage());
            return false;
        }
    }
    public static function esTeuElArticle($id, $user_id)
    {
        try {
            $article = self::where('id', $id)->first();
            return $article && $article->user_id == $user_id;
        } catch (\Exception $e) {
            error_log("Error al comprobar si el artículo es tuyo: " . $e->getMessage());
            return false;
        }
    }
    public function trobarArticlePerID($id) {
        try {
            return self::where('id', $id)->first();
        } catch (\Exception $e) {                                
            error_log("Error al obtener artículo por ID: " . $e->getMessage());
            return null;
        }
    }

    public function introduirArticles($titol, $cos, $data, $user_id, $image_path = null)
    {
        try {
            return self::create([
                'titol' => $titol,
                'cos' => $cos,
                'data' => $data,
                'user_id' => $user_id,
                'image_path' => $image_path
            ]);
        } catch (\Exception $e) {
            Log::error("Error al insertar artículo: " . $e->getMessage());
            return false;
        }
    }

    public function mostrarTotsArticles() {
        try {
            return self::all();
        } catch (\Exception $e) {
            error_log("Error al mostrar todos los artículos: " . $e->getMessage());
            return false;
        }
    }
    public static function mostrarUsuariArticle($user_id)
    {
        $usuariModel = new UsuariModel();
        $usuari = $usuariModel->filtrarUsuarisPerID($user_id);

        return $usuari ? $usuari['nickname'] : 'No lo ha creat cap usuari registrat';
    }

    public function borrarArticles($id) {
        try {
            self::destroy($id);
        } catch (\Exception $e) {
            error_log("Error al borrar artículo: " . $e->getMessage());
            return false;
        }
    }

    public function mostrarArticlesOrdenats($columna, $ordre) {
        $columnasPermitidas = ['id', 'titol'];
        $ordenesPermitidos = ['ASC', 'DESC'];

        if (!in_array($columna, $columnasPermitidas) || !in_array($ordre, $ordenesPermitidos)) {
            throw new InvalidArgumentException("Columna o el ordre no válid.");
        }

        try {
            $stmt = $this->connexio->prepare("SELECT id, titol, cos, data, user_id FROM articles ORDER BY $columna $ordre");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            error_log("Error al mostrar artículos ordenados: " . $e->getMessage());
            return [];
        }
    }
    public function getArticles(): JsonResponse
    {
        $articles = ArticleModel::all();
        return response()->json([
            "data" => $articles
        ]);
    }

    public function deleteArticle($id): JsonResponse
    {
        try {
            $article = ArticleModel::find($id);
            if (!$article) {
                return response()->json(["error" => "Article no trobat"], 404);
            }

            $article->delete();
            return response()->json(["success" => "Article eliminat"]);
        } catch (\Exception $e) {
            return response()->json(["error" => "Error al eliminar l'article"], 500);
        }
    }

    public function pujarFotoArticle()
    {
        if ($this->image_path) {
            return asset('storage/' . $this->image_path);
        }
        return null;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accesor para la URL de la imagen
     */
    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }

    /**
     * Eliminar la imagen asociada al borrar el artículo
     */    
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($article) {
            if ($article->image_path && Storage::disk('public')->exists($article->image_path)) {
                Storage::disk('public')->delete($article->image_path);
            }
        });
    }
}
