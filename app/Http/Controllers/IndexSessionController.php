<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleModel; 
use App\Models\UsuariModel;  
use Illuminate\Support\Facades\Auth;



class IndexSessionController extends Controller
{
    public function indexsession(Request $request)
    {
        // El parametre per defecte
        $order = $request->input('order', 'normal');
    
        // Obtenir tots els articles
        $articleModel = new ArticleModel();
        $allArticles = $articleModel->mostrarTotsArticles();

        // Paginacio manual
        $page = $request->input('page', 1);
        $perPage = 10; 

        // Obteneir els artícles de la página actual
        $articles = $allArticles->forPage($page, $perPage); 
    
        // Calcula el total de les pagines
        $totalPagines = ceil($allArticles->count() / $perPage);

        $esTeuElArticle = [$this, 'esTeuElArticle'];
    
        
        
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['error' => 'Si us plau, inicia sesio.']);
        }

        
        // Pasar los datos a la vista
        return view('indexsession', [
            'articles' => $articles, 
            'order' => $order,       
            'paginaActual' => $page, 
            'totalPagines' => $totalPagines, 
        ]);
    }


    public function mostrarIndexSession(){

        //Obtenir tots els articles
        $articles = ArticleModel::all();  
        
        // Pasar els articles amb les seves dades a la vista
        return view('indexsession', compact('articles'));
    }  

    public function index(Request $request)
    {
        
        //Aquests es el parametre per defecte
        $order = $request->input('order', 'normal'); 

        // Aixo es el si es sistemas de ordenacio
        switch ($order) {
            case 'ascID':
                $articles = ArticleModel::orderBy('id', 'asc')->get();
                break;
            case 'descID':
                $articles = ArticleModel::orderBy('id', 'desc')->get();
                break;
            case 'ascNom':
                $articles = ArticleModel::orderBy('titol', 'asc')->get();
                break;
            case 'descNom':
                $articles = ArticleModel::orderBy('titol', 'desc')->get();
                break;
            default:
                $articles = ArticleModel::all(); 
        }

        // Li en pasas a la vista el order i els articles
        return view('indexsession', compact('articles', 'order'));
    }


    // Funció per obtenir el nom de l'usuari
    public function mostrarUsuariArticle($user_id)
    {
        $usuariModel = new UsuariModel();
        $usuari = $usuariModel->filtrarUsuarisPerID($user_id);

        return $usuari;
    }

    // Funció per ajustar el format de la data
    public function ajustarData($data)
    {
        if ($data) {
            return \Carbon\Carbon::createFromFormat('Y-m-d', $data)->format('d/m/Y');
        } else {
            return 'Data no disponible';
        }
    }

    // Funció per verificar si l'article pertany a l'usuari actual
    public function esTeuElArticle($user_id_article)
    {


        if ($user_id_article) {
            $articleModel = new ArticleModel();
            $user_nickname = $articleModel->mostrarUsuariArticle($user_id_article);
            return session('nickname') === $user_nickname;
        }

        return false;
    }
}
