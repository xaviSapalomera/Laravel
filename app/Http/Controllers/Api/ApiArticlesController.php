<?php
namespace App\Http\Controllers\Api;

use App\Models\ArticleModel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\UsuariJWT;
use Illuminate\Support\Facades\Log;

    class ApiArticlesController extends Controller
    {
        private $articleModel;
        
        public function __construct()
        {
            $this->articleModel = new ArticleModel();
        }

        //Funcio per mostrar tots els articles per JSON
        public function index()
        {
            $articles = $this->articleModel::all();
            return response()->json($articles);
        }


public function creaArticle(Request $request)
{
    try {
        // Verificar que el token JWT sea válido y obtener el usuario autenticado
        $user = JWTAuth::parseToken()->authenticate();

        // Validar los datos del artículo
        $validatedData = $request->validate([
            'titol' => 'sometimes|string|max:255',
            'cos' => 'sometimes|string',
        ]);

        // Crear el artículo
        $article = ArticleModel::create([
            'titol' => $validatedData['titol'],
            'cos' => $validatedData['cos'],
            'data' => now(),
            'user_id' => $user->id,  // Usar el ID del usuario autenticado
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Article created successfully',
            'data' => [
                'article_id' => $article->id,
                'titol' => $article->titol,
                'created_at' => $article->data,
            ]
        ], 201);

    } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Token expirat',
            'solution' => 'Torna a iniciar sessio per obtenir un nou token'
        ], 401);
    } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Token invalid',
        ], 401);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Error al crear l\'article',
            'debug' => config('app.debug') ? $e->getMessage() : null
        ], 500);
    }
}
public function actualitzarArticle(Request $request, $id){
    try {
        // Verificar que el token JWT sea válido y obtener el usuario autenticado
        $user = JWTAuth::parseToken()->authenticate();

        // Validar los datos del artículo
        $request->validate([
            'titol' => 'required|string|max:255',
            'cos' => 'required|string',
        ]);


            
            // Buscar el artículo
            $article = ArticleModel::findOrFail($id);
            
            // Verificar que el usuario es el propietario
            if ($article->user_id != $user->id) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No tens permisos per actualitzar aquest article'
                ], 403);
            }
    
            // Preparar datos para actualizar
            $updateData = [
                'data' => now()
            ];
            
            if ($request->has('titol')) {
                $updateData['titol'] = $request->titol;
            }
            
            if ($request->has('cos')) {
                $updateData['cos'] = $request->cos;
            }
    
            // Actualizar el artículo
            $article->update($updateData);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Article actualitzat correctament',
                'data' => [
                    'id' => $article->id,
                    'titol' => $article->titol,
                    'user_id' => $article->user_id,
                    'updated_at' => $article->data
                ]
            ]);
    
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Article no trobat'
            ], 404);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al actualitzar l\'article',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}