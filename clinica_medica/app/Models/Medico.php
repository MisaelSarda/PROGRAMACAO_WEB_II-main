<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model {
    use HasFactory;

    protected $fillable = ['nome', 'especialidade', 'telefone'];

    public function consultas() {
        return $this->hasMany(Consulta::class);
    }
}
