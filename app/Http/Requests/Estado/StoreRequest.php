<?php

namespace App\Http\Requests\Estado;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreRequest extends FormRequest
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
        // $data = $this->route();
        return [
            'tipo_recurso_id' => ['required','numeric'],
            'nombre'=>['min:5', 'max:255', 'required', Rule::unique('estados')->where(function ($query) {
                // Validar que el nombre no esté repetido para el mismo tipo_recurso_id
                return $query->where('tipo_recurso_id', $this->tipo_recurso_id);
            }),]
        ];
    }

    //capitaliza el nombre
    protected function prepareForValidation()
    {
        $this->merge([
            'nombre' => capitalizeEachWord($this->input('nombre')),
        ]);
    }
}
