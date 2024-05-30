<?php

namespace App\Http\Requests\Estado;

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
        $id = $this->route('estado')->id ?? null;
        return [
            'tipo_recurso_id' => ['required','numeric'],
            'nombre' =>[ 'required','string', 'min:5','max:255', Rule::unique('estados')->where(function ($query) {
                // Validar que el nombre no esté repetido para el mismo tipo_recurso_id
                return $query->where('tipo_recurso_id', $this->tipo_recurso_id);
            })->ignore($id),],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'nombre' => capitalizeEachWord($this->input('nombre')),
        ]);
    }

}
