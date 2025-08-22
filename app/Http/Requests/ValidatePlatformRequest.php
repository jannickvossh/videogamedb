<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ValidatePlatformRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $platformNameValidation = ['bail', 'required'];

        Route::currentRouteName() == 'store.platform' ? array_push($platformNameValidation, 'unique:platforms,name') : '';

        return [
            'platform_name'    => $platformNameValidation
        ];
    }

    public function attributes(): array
    {
        return [
            'platform_name'    => 'Platform name'
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
