<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'validade' => 'required|date',
            'arquivo' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx',
            'pessoa_id' => 'required|exists:pessoas,id',
            'regiao_id' => 'required|exists:regioes,id',
        ];
    }
}
