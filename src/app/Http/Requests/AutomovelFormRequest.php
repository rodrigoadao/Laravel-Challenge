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
            'nome'      => 'required|min:3|max:100',
            'ano'       => 'required|min:3|max:100',
            'modelo'    => 'required|min:3|max:100|numeric',
            'cor'       => 'required|min:3|max:100|',
            'chassi'    => 'required|max:100|numeric',
            'categoria' => 'required',
        ];
    }


    public function message(){
        return[
            'nome.required' => 'O campo nome é de preenchimento obrigatorio',
        ];
    }
}
