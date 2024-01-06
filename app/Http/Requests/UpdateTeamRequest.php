<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'team_name' => ['regex:/^[a-zA-Z\s]*$/', 'max:255'],
            'team_town' => ['regex:/^[a-zA-Z\s]*$/', 'max:255'],
            'team_logo' => ['image'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'team_name' => 'A name for the team is missing.',
            'team_town' => 'A town for the team is missing.',
            'team_logo' => 'A logo for the team is missing.',
        ];
    }
}
