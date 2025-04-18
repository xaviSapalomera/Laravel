<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\IndexSessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrarseController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ApiNoticiesController;
use Laravel\Socialite\Facades\Socialite;


//Verifica si l'usuari esta autenticat, si no ho esta, el redirigeix a la vista index.blade.php
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('indexsession'); 
    }

    return view('index');
})->name('index');

//Ruta per mostrar el formulari de login: login.blade.php
Route::get('/login', [LoginController::class, 'mostrarLogin'])->name('login');

//Serveix per enviar el formulari de login
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');



//Ruta protegida, solo la veuen els usuaris autenticats
Route::middleware(['auth'])->get('/indexsession', [IndexSessionController::class, 'index'])->name('indexsession');


//Ruta per mostrar el formulari de registre: registrarse.blade.php
Route::get('/registrarse', [RegistrarseController::class, 'mostrarRegistrarse'])->name('registrarse');


//Serveix per enviar el formulari de registre, per crear un usuari
Route::post('/registrarse', [RegistrarseController::class, 'registrarse'])->name('registrarse.post');





Route::middleware('auth')->group(function() {

    //Funcio per tancar sessio
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //Ruta para mostrar el nickname del usuari al formulari del perfil: perfil.blade.php
Route::get('/perfil', [PerfilController::class, 'mostrarnickname'])->name('perfil.mostrarnickname');


//Ruta per actualitzar el nickname del usuari al formulari del perfil: perfil.blade.php
Route::put('/perfil/nickname', action: [PerfilController::class, 'actualitzarNickname'])->name('perfil.nickname');


//Ruta per actualitzar la contrasenya del usuari al formulari del perfil: perfil.blade.php
Route::put('/perfil/contrasenya', [PerfilController::class, 'actualitzarContrasenya'])->name('perfil.actualitzarcontrasenya');


//Ruta per mostrar la pantalla de perfil: perfil.blade.php
Route::get('/perfil', [PerfilController::class, 'mostrarPerfil'])->name('mostrar.perfil');

//Serveix per anar un pagina amb el titol,cos de l'article seleccionat: article.blade.php
Route::get('/article/{id}', [ArticleController::class, 'mostrarArticle'])->name('articles.mostrar');

//Serveix per mostrar la pantalla de edició de l'article seleccionat: articleedit.blade.php
Route::get('/articles/{id}/edit', [ArticleController::class, 'pantallaEditar'])->name('articles.edit');


//Serveix per accionar el formulari per editar l'article seleccionat
Route::put('/articles/{id}/actualitzar', [ArticleController::class, 'actualizar'])->name('articles.actualitzar');


//Serveix per borrar l'article seleccionat
Route::delete('/articles/{id}/borrar', [ArticleController::class, 'borrar'])->name('articles.borrar');


Route::get('/articles/{id}/qr', [ArticleController::class, 'qr'])->name('articles.qr');


//Serveix per mostrar la pantalla de creació de articles: creararticle.blade.php
Route::get('/creararticle', [ArticleController::class, 'pantallaCrear'])->name('articles.pantallacrear');


//Serveix per accionar el formulari per crear un article
Route::post('/creararticle', [ArticleController::class, 'crearArticle'])->name('crear.article');

//Ruta per mostrar la pantalla del QR de l'article seleccionat
Route::get('/articles/{id}/qr', [ArticleController::class, 'generarQR'])->name('articles.qr');


Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');


Route::get('articles/{id}', [ArticleController::class, 'mostrarArticle'])->name('articles.mostrar');


Route::put('/perfil/{id}/foto', [PerfilController::class, 'actualitzarFotodePerfil'])->name('actualitzar.fotoperfil');

Route::get('/articles', [ArticleController::class, 'obtenirArticles']);
Route::delete('/articles/{id}', [ArticleController::class, 'borrarArticle']);

});



// Ruta per la autenticació Google
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');


// Ruta per la autenticació Google
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);





// Ruta per mostrar la pantalla de noticies API : api.blade.php
Route::get('/noticies', [ApiNoticiesController::class, 'MostrarPantallaDeNoticiesApi'])->name('noticies.index');

// Ruta per executar la funcio que obte les noticies de la API
Route::get('/api/noticies-motogp', [ApiNoticiesController::class, 'obtenirNoticiesDeLaApi']);


