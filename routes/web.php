<?php

use App\Livewire\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\AccompagnementController;
use App\Http\Controllers\AccompagnementTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/accompagnement/{slug}', [AccompagnementController::class, 'index'])->name('accompagnement');
Route::get('/type/{slug}', [AccompagnementTypeController::class, 'index'])->name('type');
Route::get('/accompagnement-equipe', [HomeController::class, 'equipe'])->name('equipe');
Route::get('/organigramme', [HomeController::class, 'organigramme'])->name('organigramme');
Route::get('/document', [HomeController::class, 'document'])->name('document');
Route::get('/photos', [HomeController::class, 'photos'])->name('photos');
Route::get('/historique', [HomeController::class, 'historique'])->name('historique');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/actualites', Posts::class)->name('actualites');
Route::get('/{slug}', [PostController::class, 'index'])->name('post.index');
