<?php

use App\Http\Controllers\Api\ApiArticlesController;
use App\Http\Controllers\Api\ApiUsuariJWTController;
use Illuminate\Support\Facades\Route;

Route::get('/articles', [ApiArticlesController::class, 'index'])->name('api.articles.index');

Route::get('/articles/{id}', [ApiArticlesController::class, 'show'])->name('api.articles.perID');

Route::post('/creatoken', [ApiUsuariJWTController::class, 'creatoken'])->name('creatoken');

Route::post('/validatoken', [ApiUsuariJWTController::class, 'validaToken'])->name('validatoken');


Route::middleware(['auth:api'])->group(function () {
    Route::post('/articles', [ApiArticlesController::class, 'creaArticle']);
    Route::put('/articles/{id}', [ApiArticlesController::class, 'actualitzarArticle']);
    Route::delete('/articles/{id}', [ApiArticlesController::class, 'borrarArticle']);
});

