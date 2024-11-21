<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validadorCliente extends FormRequest
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
            'txtnombre'  => 'required|min:4|max:255',
            'txtapellidos' => 'required|string|max:255',
            'txtcorreo'    => 'required|email|max:255',
            'txttelefono'   => 'required|numeric'
        ];
    }
}
