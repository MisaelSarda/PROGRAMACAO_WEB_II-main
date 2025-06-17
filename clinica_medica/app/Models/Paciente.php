<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model {
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone'];

    public function consultas() {
        return $this->hasMany(Consulta::class);
    }
}
