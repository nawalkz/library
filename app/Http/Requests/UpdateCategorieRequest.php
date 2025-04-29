<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategorieRequest extends FormRequest
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
            'categorie' => ['required', 'string', 'max:255'], 
        ];
    }
    /**
     * Personnalise les messages de validation.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'categorie.required' => 'Le nom de la catégorie est obligatoire.',
            'categorie.string' => 'Le nom de la catégorie doit être une chaîne de caractères.',
            'categorie.max' => 'Le nom de la catégorie ne peut pas dépasser 255 caractères.',
        ];
    }
}
