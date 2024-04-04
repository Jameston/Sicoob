<?php

namespace Modules\Produto\Http\Requests\Grupos;

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
            'id_produto_grupo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_produto_grupo.required' => 'Parâmetro ID GRUPO não informado.' ,
        ];
    }
}
