<?php

namespace Modules\Pessoa\Http\Requests;

use App\Http\Requests\FormRequest;

class CodigoRequest extends FormRequest
{
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
