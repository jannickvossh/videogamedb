<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUserRequest extends FormRequest
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
            'user_firstname'                => ['bail', 'required', 'min:' . $this->min_char],
            'user_lastname'                 => ['bail', 'required', 'min:' . $this->min_char],
            'user_username'                 => ['bail', 'required', 'min:' . $this->min_char, 'unique:users,username'],
            'user_email'                    => ['bail', 'required', 'email', 'unique:users,email'],
            'user_password'                 => ['bail', 'required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/']
        ];
    }

    public function attributes()
    {
        return [
            'user_firstname'                => 'First name',
            'user_lastname'                 => 'Last name',
            'user_username'                 => 'Username',
            'user_email'                    => 'E-mail',
            'user_password'                 => 'Password'
        ];
    }

    public function messages()
    {
        return [
            'required'                      => ':attribute needs to be filled out',
            'min'                           => ':attribute must be more than ' . $this->min_char . ' characters long.',
            'unique'                        => ':attribute must be unique.',
            'regex'                         => ':attribute is not valid.'
        ];
    }
}
