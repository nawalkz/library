<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategorieRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Autoriser tous les utilisateurs à soumettre cette requête.
        return true; // Si tu veux restreindre l'accès, tu peux changer cette valeur
    }

    /**
     * Récupère les règles de validation qui s'appliquent à la requête.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'categorie' => ['required', 'string', 'max:255'],  // Nom de la catégorie
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
