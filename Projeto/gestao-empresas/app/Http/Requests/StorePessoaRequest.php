<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePessoaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
{
    return [
        'nome' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telefone' => 'required|string|max:20',
        'vulnerabilidade' => 'nullable|string',
    ];
}

}
