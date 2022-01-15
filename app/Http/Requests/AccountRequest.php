<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'descricao' => ['bail','required','max:80'],
            'tipo' =>['required'],
            'pertence' => ['required_unless:categoria,G']
        ];
    }

    public function messages()
    {
        return [
            'pertence.required_unless' => 'Informe à qual grupo pertence essa conta',
            'tipo.required' => 'É obrigatório informar o tipo',
            'descricao.required' => 'É obrigatório informar uma descrição'
        ];
    }

}
