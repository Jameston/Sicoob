<?php

namespace Modules\Empresa\Http\Requests;

use App\Http\Requests\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required',
            'cnpj_cpf' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Parâmetro NOME não informado.',
            'email.required' => 'Parâmetro E-MAIL não informado.',
            'password.required' => 'Parâmetro SENHA não informado.',
            'cnpj_cpf.required' => 'Parâmetro CNPJ/CPF não informado.',
        ];
    }
}
