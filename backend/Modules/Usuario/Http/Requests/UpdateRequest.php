<?php

namespace Modules\Usuario\Http\Requests;

use App\Http\Requests\FormRequest;

/**
 * Class UpdateRequest
 * @package Modules\Usuario\Http\Requests
 */
class UpdateRequest extends FormRequest
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
            'usuario' => 'required',
            'id_usuario' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Parâmetro NOME não informado.',
            'usuario.required' => 'Parâmetro USUÁRIO não informado.',
            'id_usuario.required' => 'Parâmetro ID USUÁRIO não informado.',
        ];
    }
}
