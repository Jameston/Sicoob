<?php

namespace Modules\Pessoa\Http\Requests;

use App\Http\Requests\FormRequest;

/**
 * Class CreateRequest
 * @package Modules\Pessoa\Http\Requests
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
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Parâmetro NOME não informado.',
        ];
    }
}
