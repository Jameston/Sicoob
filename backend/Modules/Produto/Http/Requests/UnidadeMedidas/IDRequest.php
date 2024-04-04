<?php

namespace Modules\Produto\Http\Requests\UnidadeMedidas;

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
            'id_uni_medida' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_uni_medida.required' => 'Parâmetro ID UNIDADE MEDIDA não informado.' ,
        ];
    }
}
