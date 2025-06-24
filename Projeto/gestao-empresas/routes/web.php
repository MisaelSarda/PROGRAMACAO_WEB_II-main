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
        $hoje = date('Y-m-d');
        $limite = date('Y-m-d', strtotime('+15 days'));

        $documentosVencendo = Documento::with('pessoa')
            ->whereNotNull('data_validade')
            ->whereBetween('data_validade', [$hoje, $limite])
            ->get();

        return view('dashboard', [
            'pessoas' => Pessoa::count(),
            'documentos' => Documento::count(),
            'regioes' => Regiao::count(),
            'documentosVencendo' => $documentosVencendo
        ]);
    })->name('dashboard');

    Route::resource('pessoas', PessoaController::class);
    Route::resource('documentos', DocumentoController::class);
    Route::resource('regioes', RegiaoController::class)->parameters([
        'regioes' => 'regiao'
    ]);
});
require __DIR__.'/auth.php';
