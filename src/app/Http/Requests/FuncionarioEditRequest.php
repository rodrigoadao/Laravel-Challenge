<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioEditRequest extends FormRequest
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
            'nome'         => 'required|min:3|max:100',
            'endereco'     => 'required|min:3|max:100',
            'dtNacimento'  => 'required|min:10',
            'sexo'         => 'required|numeric',
            'cpf'          => 'required|min:14',
            'cargo'        => 'required|max:20|min:3',
            'salario'      => 'required',
            'filial_id'    => 'required'
        ];
    }

    public function messages(){
        return[
            'nome.required'         => 'O campo nome é de preenchimento obrigatório.',
            'nome.min'              => 'O campo nome deve conter mais que 3 caracteres.',
            'filial_id.required'    => 'O campo filial é de preenchimento obrigatório.',
            'endereco.required'     => 'O campo endereço é de preenchimento obrigatório',
            'endereco.min'          => 'O campo endereço deve contar mais que 3 caracteres.',
            'dtNacimento.required'  => 'O campo data de nascimento é de preenchimento obrigatório',
            'dtNacimento.min'       => 'Data de nascimento inválido.',
            'sexo.required'         => 'O campo sexo é de preenchimento obrigatório.',
            'cpf.required'          => 'O campo cpf e de preenchimento obrigatório.',
            'cpf.min'               => 'Cpf inválido.',
            'cargo.required'        => 'O campo cargo é de preenchimento obrigatório.',
            'cargo.max'             => 'Cargo inválido.',
            'cargo.min'             => 'Cargo inválido.',
            'salario.required'      => 'O campo salário é de preenchimento obrigatório.',
            'salario.numeric'       => 'Salário inválido.'
        ];
    }
}
