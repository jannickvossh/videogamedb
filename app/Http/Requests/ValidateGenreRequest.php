<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ValidateGenreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $genreNameValidation = ['bail', 'required'];

        Route::currentRouteName() == 'store.genre' ? array_push($genreNameValidation, 'unique:genres,name') : '';

        return [
            'genre_name'    => $genreNameValidation
        ];
    }

    public function attributes(): array
    {
        return [
            'genre_name'    => 'Genre name'
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
