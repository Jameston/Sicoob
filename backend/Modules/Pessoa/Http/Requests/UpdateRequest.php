<?php

namespace Modules\Pessoa\Http\Requests;

use App\Http\Requests\FormRequest;

/**
 * Class CreateRequest
 * @package Modules\Pessoa\Http\Requests
 */
class UpdateRequest extends FormRequest
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
            'nome' => 'required',
            'cnpj_cpf' => 'required',
            'id_pessoa' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Parâmetro NOME não informado.',
            'cnpj_cpf.required' => 'Parâmetro CPF/CNPJ não informado.',
            'id_pessoa.required' => 'Parâmetro ID Pessoa não informado.',
        ];
    }
}
