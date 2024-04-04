<?php

namespace Modules\Sistema\Http\Requests;

use App\Http\Requests\FormRequest;

class FiltroRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'filtro' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'filtro.required' => 'Parâmetro FILTRO não informado.' ,
        ];
    }
}
