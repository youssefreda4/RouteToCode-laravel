<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name' => 'required|string|min:6|max:35',
            'email' => 'required|email',
            Rule::unique('users')->ignore($this->id),
            'about' => 'string|max:1500',
            'phone' => 'string|max:10',
            'address' => 'string|max:100',
            'image' => 'image|mimes:png,jpg',
            'password' => 'nullable|string|min:8|max:15|confirmed'
        ];
    }
}
