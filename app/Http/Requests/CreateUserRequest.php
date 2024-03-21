<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string',
            'lastname' => 'required|string',
            'phone' => ['required', 'string', 'regex:/^[0-9]+$/', 'min:10'],
            'age' => 'required|integer',
            'email' => 'required|unique:users,email',
            'size' => 'required|numeric',
            'weight' => 'required| numeric',
        ];
    }
}
