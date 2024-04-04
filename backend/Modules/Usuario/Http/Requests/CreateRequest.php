<?php

namespace Modules\Usuario\Http\Requests;

use App\Http\Requests\FormRequest;

/**
 * Class CreateRequest
 * @package Modules\Usuario\Http\Requests
 */
class CreateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required',
            'password' => 'required',
            'usuario' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Parâmetro NOME não informado.',
            'password.required' => 'Parâmetro PASSWORD não informado.',
            'usuario.required' => 'Parâmetro USUÁRIO não informado.',
        ];
    }
}
