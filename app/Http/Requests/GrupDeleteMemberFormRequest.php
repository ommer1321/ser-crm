<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupDeleteMemberFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user' => ['required', 'exists:users,user_id'],
            'grup' => ['required', 'exists:grups,grup_id'],
        ];
    }
}
