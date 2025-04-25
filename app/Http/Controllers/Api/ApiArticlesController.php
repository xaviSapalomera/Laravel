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

// Funcio per crear un article
public function creaArticle(Request $request)
{
    try {
        // Verificar que el token JWT sigui valid i obtenir l'usuari autenticat
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
            'user_id' => $user->id,
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
        ], 500);
    }
}

// Funcio per actualitzar article per ID
public function actualitzarArticle(Request $request, $id){
    try {
        // Verifica que el token JWT sigui valid i obtenir l'usuari autenticat
        $usuari = JWTAuth::parseToken()->authenticate();

        // Validar les dades de l'article
        $request->validate([
            'titol' => 'string|max:255',
            'cos' => 'string',
        ]);


            
            // Busca l'article per ID
            $article = ArticleModel::findOrFail($id);
            
            // Verificar que es el propietari o admin
            if ($article->user_id != $usuari->id && $usuari->admin != 1) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No tens permisos per actualitzar aquest article'
                ], 403);
            }
    
            // Actualitzar la data de l'article
            $DadeActualitzada = ['data' => now()];
            
            if ($request->has('titol')) {
                $DadeActualitzada['titol'] = $request->titol;
            }
            
            if ($request->has('cos')) {
                $DadeActualitzada['cos'] = $request->cos;
            }
    
            // Actualitzar el article
            $article->update($DadeActualitzada);
    
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
    //Funcio per borrar article per ID
    public function borrarArticle(Request $request, $id){
        try {
            // Verifica que el token JWT sigui valid i obtenir l'usuari autenticat
            $user = JWTAuth::parseToken()->authenticate();
                
                // Busca l'article per ID
                $article = ArticleModel::findOrFail($id);
                
                // Verificar que es el propietari o admin
                if($article->user_id != $user->id && $user->admin != 1) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'No tens permisos per borrar aquest article'
                    ], 403);
                }
                
                // Borrar l'article
                ArticleModel::where('id', $id)->delete();
        
                // Retornar la resposta resposta
                return response()->json([
                    'status' => 'success',
                    'message' => 'Article eliminar correctament',
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
                    'message' => 'Error al borrar l\'article',
                ], 500);
            }
        }
}
