<?php

namespace Modules\Produto\Http\Requests;

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
            'descricao' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'Parâmetro DESCRICAO não informado.',
        ];
    }
}
