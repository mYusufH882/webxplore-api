<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileInputRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'folder_id' => 'nullable|exists:folders,id',
            'file' => 'required|file|max:2048|mimes:jpeg,png,jpg'
        ];
    }
}
