<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class VehicleStoreRequest extends FormRequest
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
            'plate_number' => ['required', 'string', 'max:6'],
            'year' => ['required', 'integer'],
            'model_id' => ['required', 'integer'],
            'client_id' => ['required', 'integer'],
        ];
    }

    public function attributes(): array
    {
        return [
            'plate_number' => 'placa',
            'model_id' => 'modelo',
            'client_id' => 'cliente'
        ];
    }
}
