<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditAdminRequest extends FormRequest
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
            Rule::unique('admins')->ignore($this->id),
            'image' => 'image|mimes:png,jpg',
            'password' => 'nullable|string|min:8|max:15|confirmed'
        ];
    }
}
