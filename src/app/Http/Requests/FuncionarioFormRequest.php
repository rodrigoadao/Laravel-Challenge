<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioFormRequest extends FormRequest
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
            'dtNacimento'        => 'required|max:20',
            'sexo'      => 'required|numeric',
            'cpf'      => 'required|numeric',
            'cargo'      => 'required|max:20',
            'salario'      => 'required|numeric',
        ];
    }

    public function messages(){
        return[
            'nome.required' => 'O campo nome é de preenchimento obrigatorio',
        ];
    }
}
