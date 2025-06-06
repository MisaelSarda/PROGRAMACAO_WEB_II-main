<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContatosController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('contatos',ContatosController::class)->middleware(['auth', 'verified']);

    Route::get('/about', function (){
        return view ('about');
    })->middleware(['auth','verified'])->name('about');

require __DIR__.'/auth.php';
