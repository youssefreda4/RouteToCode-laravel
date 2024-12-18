<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:8',
            'description' => 'required|string|max:1500',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:png,jpg,jpeg,gif'
        ];
    }

    public function messages(): array
    {
        return [
            'category_id' => 'The category field is required.',
        ];
    }
}
