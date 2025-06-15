<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'tipo',
        'validade',
        'arquivo',
        'pessoa_id',
        'regiao_id',
    ];

    public function pessoa()
    {
        return $this->belongsTo(\App\Models\Pessoa::class);
    }

    public function regiao()
    {
        return $this->belongsTo(\App\Models\Regiao::class);
    }
}
