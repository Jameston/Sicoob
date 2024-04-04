<?php

namespace Modules\Produto\Http\Requests\UnidadeMedidas;

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
            'id_uni_medida' => 'required',
            'unidade' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'Parâmetro DESCRICAO não informado.',
            'id_uni_medida.required' => 'Parâmetro ID UNIDADE MEDIDA não informado.',
            'unidade.required' => 'Parâmetro UNIDADE não informado.',
        ];
    }
}
