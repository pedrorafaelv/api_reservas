<?php

namespace App\Http\Requests\Industria;

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
        return [
            'nombre'=>['required', 'min:5', 'max:255', 'unique:industrias,nombre']
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'nombre' => capitalizeEachWord($this->input('nombre')),
        ]);
    }
}
