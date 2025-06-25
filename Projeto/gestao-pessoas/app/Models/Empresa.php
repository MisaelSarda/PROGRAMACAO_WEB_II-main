<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['nome', 'cnpj', 'email', 'telefone', 'endereco'];

    public function colaboradores()
    {
        return $this->hasMany(Colaborador::class);
    }
}
