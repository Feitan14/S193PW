<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validadorHoteles extends FormRequest
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
            'nombreHuesped' => 'required|string|max:255',
            'fechaEntrada' => 'required|date|after_or_equal:today',
            'fechaSalida' => 'required|date|after:fechaEntrada',
            'ubicacionHotel' => 'required|string|max:255',
            'cantidadHabitaciones' => 'required|integer|min:1|max:10',
            'numeroAdultos' => 'required|integer|min:1',
            'numeroNinos' => 'nullable|integer|min:0',
        ];
    }
}
