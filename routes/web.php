<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PublicController::class, 'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/announcement/new', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/announcement/store' , [AnnouncementController::class, 'store'])->name('announcement.store');
// VISUALIZZARE IL SINGOLO ANNUNCIO
Route::get('/announcement/{announcement}', [PublicController::class, 'show'])->name('announcement.show');
// VISUALIZZARE PAGINA CATEGORIA
Route::get('/category/{name}/{id}/announcement', [PublicController::class, 'category'])->name('announcement.category');

