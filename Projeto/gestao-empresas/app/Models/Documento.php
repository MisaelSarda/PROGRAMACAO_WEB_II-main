<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = ['colaborador_id', 'nome', 'descricao', 'validade', 'arquivo'];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }
}
