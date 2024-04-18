<?php

namespace App\Http\Requests\Empresa;

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
            'nombre' =>[ 'required','string', 'min:5','max:255'],
            'direccion' => ['required','string','max:255'],
            'telefono' => ['required','string','max:20'],
            'email' => ['required','string','email','max:255'],
            'industria_id' => ['required','numeric','exists:industrias,id'],
            'fundacion' => ['required','date'],
        ];
    }
}
