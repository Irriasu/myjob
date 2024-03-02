<?php

use App\Http\Controllers\AnonceController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\DiplomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('hada');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/',[AnonceController::class,'index']);
Route::get('DeposerAnonce',[AnonceController::class,'create']);
Route::post('CreateAnonce',[AnonceController::class,'store']);
Route::get('dashboard/{id}',[CertificatController::class,'index']);
Route::get('dashboard/{id}',[DiplomeController::class,'index']);
Route::get('dashboard/{id}',[AnonceController::class,'index']);

require __DIR__.'/auth.php';
