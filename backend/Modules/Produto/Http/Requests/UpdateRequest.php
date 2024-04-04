<?php

namespace Modules\Produto\Http\Requests;

use App\Http\Requests\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'descricao' => 'required',
            'id_produto' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'Parâmetro DESCRICAO não informado.',
            'id_produto.required' => 'Parâmetro ID PRODUTO não informado.',
        ];
    }
}
