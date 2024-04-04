<?php

namespace Modules\Empresa\Http\Requests;

use App\Http\Requests\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_empresa' => 'required',
            'nome' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_empresa.required' => 'Parâmetro ID_EMPRESA não informado.',
            'nome.required' => 'Parâmetro NOME não informado.',
            'email.required' => 'Parâmetro E-MAIL não informado.',
            'password.required' => 'Parâmetro SENHA não informado.',
        ];
    }
}
