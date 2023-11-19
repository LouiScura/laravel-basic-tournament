<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
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
            'team_name' => ['required', 'string', 'max:255'],
            'team_town' => ['required', 'string', 'max:255'],
            'team_logo' => ['required', 'image'],
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
            'team_name.required' => 'A name for the team is required.',
            'team_town.required' => 'A town for the team is required.',
            'team_logo.required' => 'A logo for the team is required.',
        ];
    }
}
