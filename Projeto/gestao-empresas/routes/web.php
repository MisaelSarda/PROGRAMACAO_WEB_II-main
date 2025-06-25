<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\RegiaoController;
use App\Models\Pessoa;
use App\Models\Documento;
use App\Models\Regiao;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Redirect raiz
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => redirect()->route('dashboard'));

/*
|--------------------------------------------------------------------------
| Rotas protegidas
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /* ▶ Dashboard ------------------------------------------------------- */
    Route::get('/dashboard', function () {

        /* ❶ Faixa de 15 dias */
        $hoje    = Carbon::today();
        $limite  = $hoje->copy()->addDays(15);

        /* ❷ Documentos que vencem no intervalo                       */
        $documentosVencendo = Documento::with('pessoa')
            ->whereNotNull('data_validade')
            ->whereBetween('data_validade', [$hoje, $limite])
            ->get();

        /* ❸ Renderiza a view */
        return view('dashboard', [
            'pessoas'            => Pessoa::count(),
            'documentos'         => Documento::count(),
            'regioes'            => Regiao::count(),
            'documentosVencendo' => $documentosVencendo,
        ]);
    })->name('dashboard');

    /* ▶ CRUDs ----------------------------------------------------------- */
    Route::resource('pessoas',     PessoaController::class);
    Route::resource('documentos',  DocumentoController::class);
    Route::resource('regioes',     RegiaoController::class)
         ->parameters(['regioes' => 'regiao']);
});

/*
|--------------------------------------------------------------------------
| Auth scaffolding
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
