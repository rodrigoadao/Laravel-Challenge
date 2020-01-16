<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutomovelFormRequest extends FormRequest
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
            'nome'      => 'required|min:3',
            'ano'       => 'required|min:4',
            'modelo'    => 'required|min:4',
            'cor'       => 'required|min:3',
            'chassi'    => 'required|min:14',
            'categoria' => 'required',
        ];
    }

    public function messages(){
        return[
            'nome.required'     => 'O campo nome é de preenchimento obrigatório.',
            'nome.min'          => 'O campo nome deve conter mais que 3 caracteres.',
            'ano.required'      => 'O campo ano é de preenchimento obrigatório.',
            'ano.min'           => 'Ano inválido.',
            'cor.required'      => 'O campo cor é de preechimento obrigatório.',
            'cor.min'           => 'Cor inválida.',
            'modelo.required'   => 'O campo modelo é de preenchimento obrigatório.',
            'modelo.min'        => 'Modelo inválido.',
            'chassi.required'   => 'O campo chassi é de preenchimento obrigatório.',
            'chassi.min'        => 'Chassi inválido.',
            'categoria.required'=> 'O campo categoria é de preenchimento obrigatório.'
        ];
    }
}
