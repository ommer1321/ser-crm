<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskFormRequest extends FormRequest
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
        'note' => 'required|max:5000|string',
        'finished_at' =>'date|nullable|after_or_equal:today',
        'status' =>'in:yellow,red,green',
        'title' => 'required|string|max:75',
        
        ];
    }
}
