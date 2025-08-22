<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateGameUserRequest extends FormRequest
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
            //
        ];
    }

    public function attributes(): array
    {
        return [
            'game_user_owns_physically'     => "Owns physically",
            'game_user_owns_digitally'      => "Owns digitally",
            'game_user_played'              => "Played",
            'game_user_finished'            => "Finished",
            'game_user_completed'           => "Completed",
            'game_user_finished_on'         => "Finished on",
            'game_user_completed_on'        => "Completed on",
            'game_user_enjoyed'             => "Enjoyed",
            'game_user_favorite'            => "Favorite"
        ];
    }

    public function messages(): array
    {
        return [
            //
        ];
    }
}
