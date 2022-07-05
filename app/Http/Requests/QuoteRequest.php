<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'author' => 'required|min:2|max:255|regex:/^[a-zA-Z]+$/u',
            'body' => 'required|min:10|max:255|regex:/^[a-zA-Z]+$/u',
        ];
    }
}
