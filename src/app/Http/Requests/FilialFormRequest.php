<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilialFormRequest extends FormRequest
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
            'nome'      => 'required|min:3|max:100',
            'endereco'  => 'required|min:3|max:100',
            'ie'        => 'required|numeric',
            'cnpj'      => 'required|numeric'
        ];
    }

    public function messages(){
        return[
            'nome.required' => 'O campo nome é de preenchimento obrigatorio',
        ];
    }
}
