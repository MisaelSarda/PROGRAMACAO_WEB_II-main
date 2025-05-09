<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\ColaboradorController;

Route::middleware(['auth'])->group(function () {
    Route::resource('colaboradores', ColaboradorController::class);
});

use App\Http\Controllers\CadastroController;


Route::middleware(['auth'])->group(function () {
    Route::get('/cadastro', [CadastroController::class, 'index'])->name('cadastro.index');
});

Route::resource('documentos', DocumentoController::class)->middleware(['auth']);

use App\Http\Controllers\EmpresaController;

Route::resource('empresas', EmpresaController::class);

