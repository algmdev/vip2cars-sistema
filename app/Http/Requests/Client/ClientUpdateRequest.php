<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ClientUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'paternal_surname' => ['required', 'string', 'max:100'],
            'maternal_surname' => ['required', 'string', 'max:100'],
            'document_number' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'max:150'],
            'phone_number' => ['required', 'string', 'max:15'],
        ];
    }

    public function attributes(): array
    {
        return [
            'paternal_surname' => 'apellido paterno',
            'maternal_surname' => 'apellido materno',
            'document_number' => 'documento',
            'phone_number' => 'telefono'
        ];
    }
}
