<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuteurRequest extends FormRequest
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
            'auteur' => 'required|string|max:255',
            
        ];
    }
    public function messages()
    {
        return [
            'auteur.required' => 'Le nom de l auteur est obligatoire.',
            'auteur.string' => 'Le nom de l auteur doit être une chaîne de caractères.',
            'auteur.max' => 'Le nom de l auteur ne peut pas dépasser 255 caractères.',
        ];
    }
}
