<?php

namespace Modules\Pessoa\Http\Requests;

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
            'id_pessoa' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_pessoa.required' => 'Parâmetro ID PESSOA não informado.' ,
        ];
    }
}
