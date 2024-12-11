<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validadorVuelos extends FormRequest
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
            'origen' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'fechaSalida' => 'required|date|after_or_equal:today',
            'fechaLlegada' => 'required|date|after_or_equal:fechaSalida',
            'horaSalida' => 'required|date_format:H:i',
            'horaLlegada' => 'required|date_format:H:i|after:horaSalida',
        ];
    }
}
