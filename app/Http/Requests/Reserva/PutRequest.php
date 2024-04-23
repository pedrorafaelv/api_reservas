<?php

namespace App\Http\Requests\Reserva;

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
            'empresa_id' => ['required','numeric','exists:empresas,id'],
            'fecha_inicio'=>['date'],
            'fecha_fin' =>['date', 'after:fecha_inicio'],
            'cliente_id' => ['required','numeric','exists:clientes,id'],
            'recurso_id' => ['required','numeric','exists:recursos,id'],
            'estado_id' => ['required','numeric','exists:estados,id'],
        ];
    }
}
