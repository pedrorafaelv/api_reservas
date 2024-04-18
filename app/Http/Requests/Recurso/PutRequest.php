<?php

namespace App\Http\Requests\Recurso;

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
            'time_format_reserve' => ['required','numeric','max:1440'],
            'estado_id' => ['required','numeric','exists:estados,id'],
            'empresa_id' => ['required','numeric','exists:empresas,id'],
            'tipo_recurso_id' => ['required','numeric','exists:tipo_recursos,id'],
        ];
    }
}
