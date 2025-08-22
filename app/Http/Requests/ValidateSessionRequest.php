<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSessionRequest extends FormRequest
{
    protected $min_char = 1;

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
            'user_username'                 => ['bail', 'required', 'exists:users,username'],
            'user_password'                 => ['bail', 'required']
        ];
    }

    public function attributes()
    {
        return [
            'user_username'                 => 'Username',
            'user_password'                 => 'Password'
        ];
    }

    public function messages()
    {
        return [
            'exists'                        => ':attribute does not exist',
            'required'                      => ':attribute needs to be filled out'
        ];
    }
}
