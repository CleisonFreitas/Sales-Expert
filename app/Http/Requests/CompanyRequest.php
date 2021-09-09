<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'ceo_nome' => 'required|max:20|min:3',
            'ceo_sobrenome' => 'required|max:40|min:3',
            'empr_nome' => 'required|max:80|min:8',
            'cep' => 'required|max:20|min:3'
        ];
    }
}
