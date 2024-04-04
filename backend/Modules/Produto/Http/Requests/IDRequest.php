<?php

namespace Modules\Produto\Http\Requests;

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
            'id_produto' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_produto.required' => 'Parâmetro ID PRODUTO não informado.' ,
        ];
    }
}
