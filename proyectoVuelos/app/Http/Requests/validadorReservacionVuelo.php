<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validadorReservacionVuelo extends FormRequest
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
            'nombrePasajero' => 'required|string|max:255',
            'origen' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'fechaSalida' => 'required|date|after_or_equal:today',
            'fechaRegreso' => 'nullable|date|after:fechaSalida',
            'numeroAdultos' => 'required|integer|min:1',
            'numeroNinos' => 'nullable|integer|min:0',
        ];
    }
}
