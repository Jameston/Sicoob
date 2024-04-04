<?php

namespace Modules\Produto\Http\Requests\UnidadeMedidas;

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
            'unidade' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'unidade.required' => 'Parâmetro UNIDADE não informado.',
        ];
    }
}
