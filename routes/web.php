<?php

use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
use App\Models\Etudiant;
use App\Models\Filiere;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $nbEtudiants = Etudiant::count();
    $nbFilieres = Filiere::count();
    return view('welcome', compact('nbEtudiants', 'nbFilieres'));
})->name('welcome');

Route::resource('filieres', FiliereController::class)->except(['show','edit','update']);
Route::resource('etudiants', EtudiantController::class)->except(['show','edit','update']);
