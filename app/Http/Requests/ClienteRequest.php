<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255',
            'endereco' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Preencha um nome',
            'nome.max' => 'Nome deve ter até 255 caracteres',
            'email.required' => 'Preencha um e-mail',
            'email.email' => 'Preencha um e-mail válido',
            'email.max' => 'E-mail deve ter até 255 caracteres',
            'endereco.required' => 'Preencha um endereco'
        ];
        

        // return [
        //     'nome' => [
        //         'require' => 'Preencha um nome',
        //         'max' => 'Nome deve ter até 255 caracteres'
        //     ],
        //     'email' => [
        //         'require' => 'Preencha um e-mail',
        //         'email' => 'Preencha um e-mail válido',
        //         'max' => 'E-mail deve ter até 255 caracteres'
        //     ],
        //     'endereco' => [
        //         'require' => 'Preencha um nome'
        //     ]
        // ];        
    }
}
