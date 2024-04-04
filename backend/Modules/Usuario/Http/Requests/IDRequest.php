<?php

namespace Modules\Usuario\Http\Requests;

use App\Http\Requests\FormRequest;

/**
 * Class IDRequest
 * @package Modules\Usuario\Http\Requests
 */
class IDRequest extends FormRequest
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
            'id_usuario' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_usuario.required' => 'Parâmetro ID USUARIO não informado.' ,
        ];
    }
}
