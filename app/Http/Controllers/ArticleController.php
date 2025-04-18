<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\ArticleModel; 
use Illuminate\Support\Facades\Log;
use App\Models\UsuariModel;  
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;



class ArticleController extends Controller
{
    private $usuariModel;
    private $articleModel;
    public function __construct(){
       $this->usuariModel = new UsuariModel();
        $this->articleModel = new ArticleModel();
    }

    // Funcio per mostrar la pantalla d'index de articles amb la paginacio
    public function index(Request $request)
{
    $order = $request->input('order', 'normal');



    // Obtenir els aricles 
    $articles = ArticleModel::orderBy('created_at', 'desc')->paginate(10); 

    foreach ($articles as $article) {
        $article->qrCode = base64_encode(QrCode::format('svg')->size(200)->generate(route('articles.mostrar', $article->id)));
    }
    // Paginació manual
    $paginaActual = $articles->currentPage();
    $totalPagines = $articles->lastPage();

    // Retornar la vista amb les variables necesarias
    return view('indexsession', [
        'articles' => $articles,
        'order' => $order,
        'paginaActual' => $paginaActual,
        'totalPagines' => $totalPagines,
    ]);
}


//Funcio per mostrar la pantalla de creacio d'articles
public function pantallaCrear()
{
    return view('creararticle');
}

//Funcio per crear un article
public function crearArticle(Request $request)
{
    try {
        // Valida les dades del formulari
        $request->validate([
            'titol' => 'required|string|max:255|min:5',
            'cos' => 'required|string|min:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Processa l'imatge
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
            
            // Corrección per el directoris windows
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                $imagePath = str_replace('\\', '/', $imagePath);
            }
        }

        // Crear el article
        $article = ArticleModel::create([
            'titol' => $request->titol,
            'cos' => $request->cos,
            //'data' => now(),
            'user_id' => Auth::id(),
            'image_path' => $imagePath
        ]);

        return redirect()->route('articles.mostrar', $article->id)
            ->with('success', 'Article creat correctament!');

    } catch (\Exception $e) {
        Log::error('Error al crear el article: ' . $e->getMessage());
        return back()->withInput()->with('error', 'Error al crear el article: ' . $e->getMessage());
    }
}

//Funcio per mostrar la pantalla d'editar article segun l'id que li passem
public function pantallaEditar($id){

    $article = $this->articleModel->trobarArticlePerID($id);

    return view('articleedit', compact('article'));
}

// Funcio per mostrar l'article per id
public function mostrarArticle($id)
{
    $articleModel = new ArticleModel();
    $article = $articleModel->trobarArticlePerID($id);
    $puedeEditar = Auth::id() === $article->user_id;

    return view('article', compact('article', 'puedeEditar'));
}


// Funcio per actualitzar l'article
public function actualizar(Request $request, $id)
{
    try {
        //Validar les dades del formulari
        $request->validate([
            'titol' => 'required|string|max:255',
            'cos' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Obtener el artículo de la base de dades
        $article = ArticleModel::findOrFail($id);

        //Actualitzar les dades de l'article
        $article->titol = $request->titol;
        $article->cos = $request->cos;

        // Procesar imagen si se puja una ova
        if ($request->hasFile('image')) {
            // Eliminar imatge anterior si existeix
            if ($article->image_path) {
                Storage::delete('public/'.$article->image_path);
            }
            
            // Guardar la nova imatge
            $imagePath = $request->file('image')->store('images', 'public');
            $article->image_path = $imagePath;
        }

        // Actualitzar el article a la base de dades
        $article->save();

        // Redireccionar a la vista de l'article amb un missatge d'exit
        return redirect()->route('articles.mostrar', $article->id)
            ->with('success', 'Artícle actualitzat correctament!');

    } catch (\Exception $e) {
        Log::error('Error en el article: ' . $e->getMessage());
        return back()->withInput()->with('error', 'Error al actualitzar: ' . $e->getMessage());
    }
}


    // Funcio per borrar l'article
    public function borrar($id)
    {
        $article = $this->articleModel->findOrFail($id);
    
        if ($article) {
            $article->delete();
    
            return redirect()->route('indexsession')->with('success', 'El article ha estat esborrat correctament');
        } else {
            return redirect()->route('indexsession')->with('error', 'Artículo no trobat');
        }
    }


//Obtenir tots el articles pe el Ajax
    public function obtenirArticles(): JsonResponse
    {
        $articles = ArticleModel::all();
        return response()->json([
            "data" => $articles
        ]);
    }

// Borrar article per Ajax    
    public function borrarArticle($id): JsonResponse
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

    public function generarQR($id)
    {
        // Valida si l'article existeix
        $article = ArticleModel::findOrFail($id);
        
        // Generar la URL completa amb el id de l'article
        $articleUrl = url(route('articles.mostrar', $id));
        
        // Generar el código QR amb el url de article
        $qrCode = QrCode::size(300)
            ->margin(2)
            ->backgroundColor(255, 255, 255)
            ->color(0, 0, 0)
            ->generate($articleUrl);
        
        // Retornar el codi QR com a resposta SVG
        return response($qrCode)
            ->header('Content-Type', 'image/svg+xml')
            ->header('Content-Disposition', 'inline; filename="article-'.$id.'-qr.svg"');
    }


    //Funcio per mostrar l'article seleccionat a la vista indexsession.blade.php
    public function mostrar($id)
    {
        // Obtenir el article
        $article = ArticleModel::findOrFail($id);
        
        // Obtenir tots els articles per la paginació
        $articles = ArticleModel::paginate(10);
        
        // Enviar a la vista els articles
        return view('indexsession', compact('article', 'articles'));
    }
}

