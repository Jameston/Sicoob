<?php

namespace Modules\Pessoa\Http\Requests;

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
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Parâmetro NOME não informado.',
        ];
    }
}
