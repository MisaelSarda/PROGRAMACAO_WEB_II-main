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
            'pessoas' => Pessoa::count(),
            'documentos' => Documento::count(),
            'regioes' => Regiao::count(),
        ]);
    })->name('dashboard');

    Route::resource('pessoas', PessoaController::class);
    Route::resource('documentos', DocumentoController::class);
    Route::resource('regioes', RegiaoController::class)->parameters([
        'regioes' => 'regiao'
    ]);
});

require __DIR__.'/auth.php';
