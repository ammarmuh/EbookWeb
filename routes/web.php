<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Post;
use App\Genrelist;

// use App\Http\Controllers\DashboardPostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PostController::class, 'index']);



Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        'active' => 'about',
        "name" => "Ammar Muhammad",
        "kelas" => "XII RPL 1",
        "presensi"=> "20",
        "email" => "3103119020@student.smktelkom-pwt",
        "image" => 'Character_Albedo_Thumb.png'
    ]);
});

Route::get('/genrelist', function(){
    return view('genrelist', [
        'title' => 'Genre List',
        'active' => 'genre',
        'genrelist' => Genrelist::all()
    ]);
});
Route::get('/genrelist/{genre:slug}', function(Genrelist $genre){
    return view('genre', [
        'title' => "Genre : $genre->name",
        'active' => 'genre',
        'posts' => $genre->post,
        'genrelist' => $genre->name
    ]);
});

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');

Route::post('/register',[RegisterController::class, 'store']);

Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login',[LoginController::class, 'authenticate']);

Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});


Route::get('/dashboard', function(){
    return view('dashboard.index',[
        'active' => 'dashboard'
    ]);
})->middleware('auth');


Route::resource('/dashboard/books', DashboardPostController::class)->middleware('auth');

Route::get('/{post:slug}',[PostController::class, 'show']);

