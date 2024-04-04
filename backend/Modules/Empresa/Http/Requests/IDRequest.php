<?php

namespace Modules\Empresa\Http\Requests;

use App\Http\Requests\FormRequest;

class IDRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_empresa' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_empresa.required' => 'Parâmetro ID EMPRESA não informado.' ,
        ];
    }
}
