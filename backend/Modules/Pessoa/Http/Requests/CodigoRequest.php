<?php

namespace Modules\Pessoa\Http\Requests;

use App\Http\Requests\FormRequest;

/**
 * Class CodigoRequest
 * @package Modules\Pessoa\Http\Requests
 */
class CodigoRequest extends FormRequest
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
            'codigo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'Parâmetro CÓDIGO não informado.' ,
        ];
    }
}
