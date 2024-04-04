<?php

namespace Modules\Produto\Http\Requests\Grupos;

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
            'id_produto_grupo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'Parâmetro DESCRICAO não informado.',
            'id_produto_grupo.required' => 'Parâmetro ID GRUPO não informado.',
        ];
    }
}
