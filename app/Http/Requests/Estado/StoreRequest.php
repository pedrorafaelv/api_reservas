<?php

namespace App\Http\Requests\Estado;

use Illuminate\Foundation\Http\FormRequest;

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
        $data = $this->route();
        return [
            'entidad_id' => ['required','numeric'],
            'nombre' => ['required', 'min:5','unique_combined:estados,entidad_id,nombre'],
        ];
    }
}
