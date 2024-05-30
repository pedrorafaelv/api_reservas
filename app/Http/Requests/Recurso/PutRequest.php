<?php

namespace App\Http\Requests\Recurso;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


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
        $id = $this->route('recurso')->id ?? null;

        return [
            'nombre' =>[ 'required','string', 'min:5','max:255',  Rule::unique('recursos')->where(function ($query) {
                // Validar que el nombre no esté repetido para el mismo tipo_recurso_id
                return $query->where('empresa_id', $this->empresa_id);
            })->ignore($id),],
            'time_format_reserve' => ['required','numeric','max:1440'],
            'estado_id' => ['required','numeric','exists:estados,id'],
            'empresa_id' => ['required','numeric','exists:empresas,id'],
            'tipo_recurso_id' => ['required','numeric','exists:tipo_recursos,id'],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'nombre' => capitalizeEachWord($this->input('nombre')),
        ]);
    }

}
