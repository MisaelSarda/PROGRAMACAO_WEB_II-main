<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\RegiaoController;
use App\Models\Pessoa;
use App\Models\Documento;
use App\Models\Regiao;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'pessoas' => \App\Models\Pessoa::count(),
            'documentos' => \App\Models\Documento::count(),
            'regioes' => \App\Models\Regiao::count(),
        ]);
    })->name('dashboard');

    Route::resource('pessoas', \App\Http\Controllers\PessoaController::class);
    Route::resource('documentos', \App\Http\Controllers\DocumentoController::class);
    Route::resource('regioes', \App\Http\Controllers\RegiaoController::class);
});

require __DIR__.'/auth.php';
