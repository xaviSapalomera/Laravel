<?php

namespace App\Http\Controllers;


use jcobhams\NewsApi\NewsApi;
use Illuminate\Support\Facades\Log;

class ApiNoticiesController extends Controller
{

    // Funcio per mostrar la pantalla de noticies de la API
    public function MostrarPantallaDeNoticiesApi()
    {
        return view('api', [
            'api_articles' => $this->obtenirNoticiesDeLaApi()
        ]);
    }



    // Funcio per obtenir les noticies de la API
    public function obtenirNoticiesDeLaApi(){
        $apiKey = env('NEWSAPI_KEY');
        
        try {
            $newsapi = new NewsApi($apiKey);

            $api = $newsapi->getEverything(
                q: 'motogp',
                language: 'es',
                page_size: 10
            );
            
            //Convertir l'objecte a un array,perque es pugui mostrar a la vista
            $articles = json_decode(json_encode($api->articles), true);
            

            return $articles; 
            
        } catch (\Exception $e) {
            Log::error('Error al obtenir les notícies: ' . $e->getMessage());
            return [];
        }
    }
}