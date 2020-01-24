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
            'cnpj'      => 'required|min:18'
        ];
    }

    public function messages(){
        return[
            'nome.required'     => 'O campo nome é de preenchimento obrigatório.',
            'nome.min'          => 'Nome inválido.',
            'endereco.required' => 'O campo nome é de preenchimento obrigatório.',
            'endereco'          => 'Endereço inválido.',
            'ie.required'       => 'O campo inscrição estadual é de preenchimento obrigatório.',
            'ie.numeric'        => 'Inscrição estadual inválida.',
            'cnpj.required'     => 'O campo cnpj é de preenchimento obrigatório.',
            'cnpj.min'          => 'Cnpj inválido.'
        ];
    }
}
