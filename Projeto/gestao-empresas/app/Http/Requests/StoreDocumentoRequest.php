<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // permite que qualquer usuário autenticado use essa request
    }

    public function rules(): array
    {
        return [
            'nome'         => ['required', 'string', 'max:255'],
            'tipo'         => ['required', 'string', 'max:100'],
            'data_validade'=> ['required', 'date'],
            'arquivo'      => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png,doc,docx'],
            'pessoa_id'    => ['required', 'exists:pessoas,id'],
            'regiao_id'    => ['required', 'exists:regioes,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'           => 'O campo nome é obrigatório.',
            'tipo.required'           => 'O campo tipo é obrigatório.',
            'data_validade.required'  => 'O campo data de validade é obrigatório.',
            'data_validade.date'      => 'Informe uma data válida.',
            'arquivo.mimes'           => 'O arquivo deve ser do tipo: pdf, jpg, jpeg, png, doc ou docx.',
            'pessoa_id.required'      => 'Selecione uma pessoa.',
            'pessoa_id.exists'        => 'A pessoa selecionada não existe.',
            'regiao_id.required'      => 'Selecione uma região.',
            'regiao_id.exists'        => 'A região selecionada não existe.',
        ];
    }
}
