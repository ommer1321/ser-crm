<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupFormRequest extends FormRequest
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
            'name' => 'required|max:75|string',
            'details' =>'required|max:500|string',
            'branch' => 'required|string|max:75',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
            'user'=> 'nullable',
            ];
    }
}
