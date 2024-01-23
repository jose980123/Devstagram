<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/* Ruta agrupada 
Route::controller()->group(function(){
    
}); */

Route::get('/', function () {
    return view('principal');
});

Route::controller(RegisterController::class)->group(function(){
    Route::get('/crear-cuenta', 'index')->name('registrate.index');
    Route::post('/crear-cuenta', 'store')->name('registrate.store');
});

Route::controller(PerfilController::class)->group(function(){
    Route::get('/edit-perfil', 'index')->name('perfil.index');
    Route::post('/edit-perfil', 'store')->name('perfil.store');
});

Route::controller(ImagenController::class)->group(function(){
    Route::post('/imagenes', 'store')->name('imagenes.store');
    
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'store')->name('login.store');
});

Route::controller(logoutController::class)->group(function(){
    Route::post('/logout', 'store')->name('logout');
});

Route::controller(PostController::class)->group(function(){
    Route::get('/{user:username}', 'index')->name('posts.index');
    Route::get('/posts/create', 'create')->name('posts.create');
    Route::post('/posts', 'store')->name('posts.store');
    Route::get('/{user:username}/posts/{post:titulo}', 'show')->name('posts.show');
    Route::delete('/posts/{post:titulo}', 'destroy')->name('posts.destroy');
    
});

Route::controller(ComentarioController::class)->group(function(){
    Route::post('/{user:username}/posts/{post:titulo}', 'store' )->name('comentarios.store');
});


Route::controller(LikeController::class)->group(function(){
    Route::post('/posts/{post:titulo}/likes', 'store')->name('posts.likes.store');
    Route::delete('/posts/{post:titulo}/likes', 'destroy')->name('posts.likes.destroy');
});