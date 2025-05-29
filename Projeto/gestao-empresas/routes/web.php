<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\RegiaoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resource('colaboradores', ColaboradorController::class);
    Route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro.index');
    Route::resource('documentos', DocumentoController::class);
    Route::resource('regioes', RegiaoController::class); // ← Aqui agora substitui as empresas
});
