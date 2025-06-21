<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

  public function rules()
{
    return [
        'nome' => 'required|string|max:255',
        'tipo' => 'required|string|max:255',
        'validade' => 'nullable|date', 
        'arquivo' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png',
        'pessoa_id' => 'required|exists:pessoas,id',
        'regiao_id' => 'required|exists:regioes,id',
    ];
}

}
