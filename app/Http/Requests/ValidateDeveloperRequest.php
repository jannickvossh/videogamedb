<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ValidateDeveloperRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $developerNameValidation = ['bail', 'required'];

        Route::currentRouteName() == 'store.developer' ? array_push($developerNameValidation, 'unique:developers,name') : '';

        return [
            'developer_name'    => $developerNameValidation
        ];
    }

    public function attributes(): array
    {
        return [
            'developer_name'    => 'Developer name'
        ];
    }

    public function messages(): array
    {
        return [
            'required'          => ':attribute is required.',
            'unique'            => ':attribute must be unique.'
        ];
    }
}
