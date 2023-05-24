<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FriendshipAllowRequest extends FormRequest
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
            'who_send' => ['required','exists:users,id'],
            'who_get' => ['required','exists:users,id'],
            'status' => ['required','in:pending,approved,rejected'],

        ];
    }
}
