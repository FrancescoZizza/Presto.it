<?php

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnuncioController;
use App\Http\Controllers\AnnouncementController;

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
// Public Controller
Route::get('/',[PublicController::class,'home'])->name('homepage');
Route::get('/categoria/{category}',[PublicController::class, 'categoryShow'])->name('categoryShow');
Route::get('/ricerca/annuncio', [PublicController::class, 'searchAnnouncements'])->name('announcements.search');
Route::get('profile',[UserController::class, 'profile'])->name('profile');
//rotta per flag
Route::post('/lingua/{lang}',[PublicController::class,'setLocale'])->name('setLocale');



Route::get('/dettaglio/annuncio/{announcement}', [AnnouncementController::class, 'showAnnuncement'])->name('announcemnets.show');
Route::get('/tutti', [AnnouncementController::class, 'indexAnnuncement'])->name('announcemnets.index');

//rotte nel middleware
Route::middleware(['auth'])->group(function(){
//Rotta middleware lavora con noi 
Route::get('contact', [PublicController::class, 'contact'])->name('contact');

Route::get('/annunci/create',[AnnouncementController::class,'create'])->name('annuncio.create');

// Route per diventare revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
// Rotta rendi utente revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
// Home revisore middelware
Route::get('/revisor/home',[RevisorController::class, 'index'])->name('revisor.index');
//rotta per Home Revisor
Route::get('/revisor/home',[RevisorController::class,'index'])->name('revisor.index');
//rotta per accettare annuncio con metodo PATCH= usato per aggiornare parzialmente(in questo caso ci riferiamo alla colonna is_accepted) di un record gia esistente
Route::patch('/accetta/annuncio/{announcement}',[RevisorController::class,'acceptAnnouncement'])->name('revisor.accept_announcement');
//rotta per rifiutare annuncio
Route::patch('/rifiuta/annuncio/{announcement}',[RevisorController::class,'rejectAnnouncement'])->name('revisor.reject_announcement');
});

Route::get('/profile/updare',[PublicController::class, 'userUpdate'])->name('user.update');

// Prova api google

