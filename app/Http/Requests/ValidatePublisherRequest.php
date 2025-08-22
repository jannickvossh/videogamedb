<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ValidatePublisherRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $publisherNameValidation = ['bail', 'required'];

        Route::currentRouteName() == 'store.publisher' ? array_push($publisherNameValidation, 'unique:publishers,name') : '';

        return [
            'publisher_name'    => $publisherNameValidation
        ];
    }

    public function attributes(): array
    {
        return [
            'publisher_name'    => 'Genre name'
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
