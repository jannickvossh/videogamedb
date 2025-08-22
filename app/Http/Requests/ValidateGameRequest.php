<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ValidateGameRequest extends FormRequest
{
    protected $min_char = 1;
    protected $valid_file_types = 'jpg,jpeg,png,bmp,gif,webp';

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
        $gameTitleValidation = ['bail', 'required', 'min:' . $this->min_char];

        Route::currentRouteName() == 'store.game' ? array_push($gameTitleValidation, 'unique:games,title') : '';

        return [
            'game_title'                => $gameTitleValidation,
            'game_image'                => ['mimes:' . $this->valid_file_types],
            'game_release_date'         => ['bail', 'required', 'date'],
            'game_platforms'            => ['bail', 'required'],
            'game_genres'               => ['bail', 'required'],
            'game_developers'           => ['bail', 'required'],
            'game_publishers'           => ['bail', 'required']
        ];
    }

    public function attributes(): array
    {
        return [
            'game_title'                => "Game title",
            'game_image'                => "Game image",
            'game_release_date'         => "Initial release date",
            'game_platforms'            => "Platforms",
            'game_genres'               => "Genres",
            'game_developers'           => "Developers",
            'game_publishers'           => "Publishers"
        ];
    }

    public function messages(): array
    {
        return [
            'required'                  => ':attribute needs to be filled out.',
            'required_if'               => ':attribute needs to be filled out.',
            'min'                       => ':attribute should be at least ' . $this->min_char . ' characters long.',
            'mimes'                     => ':attribute must be a valid file type.',
            'date'                      => ':attribute needs to be a valid date.'
        ];
    }
}
