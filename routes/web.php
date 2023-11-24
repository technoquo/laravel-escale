<?php

use App\Livewire\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\AccompagnementController;
use App\Http\Controllers\AccompagnementTypeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\OrganigrammeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\YearController;
use App\Models\Historique;

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
Route::get('/accompagnement-equipe', [TeamController::class, 'index'])->name('equipe');
Route::get('/organigramme', [OrganigrammeController::class, 'index'])->name('organigramme');
Route::get('/document', [DocumentController::class, 'index'])->name('document');
Route::get('/années', [YearController::class, 'index'])->name('years');
Route::get('/années/{years}', [YearController::class, 'photos'])->name('gallery.index');
Route::get('/historique', [HistoriqueController::class, 'index'])->name('historique');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/actualites', Posts::class)->name('actualites');
Route::get('/{slug}', [PostController::class, 'index'])->name('post.index');
