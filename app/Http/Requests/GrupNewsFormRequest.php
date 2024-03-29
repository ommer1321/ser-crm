<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupNewsFormRequest extends FormRequest
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
            'user_name'=> 'required|exists:users,user_name',
            'title'  => 'nullable|string|max:75',
            'note' => 'required|max:5000',
            'tages'=> 'nullable',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Her fotoğraf dosyası için geçerli kural
            'tagged_users.*' => 'nullable|exists:users,user_id',

        ];
    }
}
