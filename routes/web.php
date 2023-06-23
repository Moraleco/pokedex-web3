<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TreinadorController;

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

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware(['guest'])
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware(['guest']);

Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('pokemons', PokemonController::class);
    Route::resource('treinadores', TreinadorController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('desvincular/{id}', [PokemonController::class, 'desvincular'])->name('pokemon.desvincular');
    Route::post('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
        ->middleware(['auth'])
        ->name('logout');
    Route::get('/pokemon/pdf', [PokemonController::class, 'generatePdf'])->name('pokemon.pdf');

});


require __DIR__ . '/auth.php';
