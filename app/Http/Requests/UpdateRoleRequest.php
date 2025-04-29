<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
             'role' => 'required|string|max:255',
             'periode' => 'required|integer|min:1',
             'nombre_livre' => 'required|integer|min:1',
        ];
    }
    public function messages()
    {
        return [
            'role.required' => 'Le champ rôle est obligatoire.',
            'role.string' => 'Le rôle doit être une chaîne de caractères.',
            'role.max' => 'Le rôle ne doit pas dépasser 50 caractères.',
    
            'periode.required' => 'Le champ période est obligatoire.',
            'periode.integer' => 'La période doit être un nombre entier.',
            'periode.min' => 'La période doit être d\'au moins 1 jour.',
    
            'nombre_livre.required' => 'Le champ nombre de livres est obligatoire.',
            'nombre_livre.integer' => 'Le nombre de livres doit être un nombre entier.',
            'nombre_livre.min' => 'Le nombre de livres doit être supérieur ou égal à 1.',
        ];
    }
}
