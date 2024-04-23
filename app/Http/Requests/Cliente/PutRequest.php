<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class PutRequest extends FormRequest
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
            'nombre'=>['required','string', 'min:5', 'max:255'],
            'email'=>['required','string','email', 'max:255', 'unique:clientes,email,'.$this->route("cliente")->id],
            'telefono'=>['required','numeric', 'unique:clientes,telefono,'.$this->route("cliente")->id],
        ];
    }
}
