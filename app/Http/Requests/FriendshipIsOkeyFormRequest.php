<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FriendshipIsOkeyFormRequest extends FormRequest
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
          'user' => ['required','exists:users,user_name'],
            'friend_status' => ['required','in:ok,no'],
        ];
    }
}