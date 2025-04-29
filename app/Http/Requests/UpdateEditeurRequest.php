<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEditeurRequest extends FormRequest
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
            'editeur' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'editeur.required' => 'Le nom de l éditeur est obligatoire.',
            'editeur.string' => 'Le nom de l éditeur doit être une chaîne de caractères.',
            'editeur.max' => 'Le nom de l éditeur ne peut pas dépasser 255 caractères.',
        ];
    }
}
