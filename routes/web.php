<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

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
Route::get('/category/{name_it}/{id}/announcement', [PublicController::class, 'category'])->name('announcement.category');
Route::get('/category/{name_es}/{id}/announcement', [PublicController::class, 'category'])->name('announcement.category');
Route::get('/category/{name_en}/{id}/announcement', [PublicController::class, 'category'])->name('announcement.category');
//caricamento immagini
Route::post('/announcement/images/upload', [AnnouncementController::class, 'uploadImage'])->name('announcement.images.upload');
//cancella immagine
Route::delete('/announcement/images/remove', [AnnouncementController::class, 'removeImage'])->name('announcement.images.remove');

Route::get('/announcement/images', [AnnouncementController::class, 'getImage'])->name('announcement.images');



Route::view('/dropzone', 'dropzone');
//revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.home');
Route::post('/revisor/announcement/{id}/accept', [RevisorController::class, 'accept'])->name('revisor.accept');
Route::post('/revisor/announcement/{id}/reject', [RevisorController::class, 'reject'])->name('revisor.reject');
Route::get('/search/results', [AnnouncementController::class, 'search'])->name('search.results');


Route::get('/contacts', [ContactController::class, 'contactUs'])->name('contacts');
Route::post('/contact_save', [ContactController::class, 'contactSave'])->name('contact_save');


//rotta lingue
Route::post('/locale/{locale}', [PublicController::class, 'locale'])->name('locale');