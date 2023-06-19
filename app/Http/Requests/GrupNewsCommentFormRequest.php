<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupNewsCommentFormRequest extends FormRequest
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
            'comment' => ['required','max:5000','string'],
            'grup' => ['required', 'exists:grups,grup_id'],
            'grup_news' => ['required', 'exists:grup_news,news_uuid'],
        
        ];
    }
}
