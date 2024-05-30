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
            'nombre'       => ['required','string','min:5', 'max:255', 'unique:empresas,nombre,'.$this->route("empresa")->id],
            'direccion'    => ['required','string','max:255'],
            'telefono'     => ['required','string','max:20'],
            'email'        => ['required','string','email','max:255', 'unique:empresas,email,'.$this->route("empresa")->id],
            'industria_id' => ['required','numeric','exists:industrias,id'],
            'fundacion'    => ['required','date'],
            'time_start'   => ['nullable','regex:/^([01][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/'],
            'time_off'     => ['nullable','regex:/^([01][0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'nombre' => capitalizeEachWord($this->input('nombre')),
        ]);
    }
}
