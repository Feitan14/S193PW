<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ControladorContacto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre'  => 'required|min:4|max:20',
            'correo'    => 'required|email|max:255',
            'telefono'   => 'required|numeric|min:9'
        ];
    }
    public function messages(
        ): array
        {
            return [
                'nombre.required' => 'El campo nombre es requerido',
                'nombre.min'      => 'El campo nombre debe tener al menos 4 caracteres',
                'nombre.max'      => 'El campo nombre no debe tener mas de 20',
                'correo.required' => 'El campo correo es requerido',
                'correo.email'    => 'El campo correo debe ser un correo electronico',
                'correo.max'      => 'El campo correo no debe tener mas de 255 caracteres',
                'telefono.required' => 'El campo telefono es requerido',
                'telefono.numeric' => 'El campo telefono debe ser numerico',
                'telefono.min'     => 'El campo telefono debe tener al menos 9 caracteres',
                ];
                }

}