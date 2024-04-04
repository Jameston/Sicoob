<?php

namespace Modules\Autenticacao\Http\Requests;

use App\Http\Requests\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Parâmetro SENHA não informado.' ,
            'email.required' => 'Parâmetro E-MAIL não informado.' ,
        ];
    }
}
