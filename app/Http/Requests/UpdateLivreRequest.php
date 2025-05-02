<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLivreRequest extends FormRequest
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
            'titre' => 'required|string|max:255',
            'auteur_id' => 'required|exists:auteurs,id',
            'categorie_id' => 'required|exists:categories,id',
            'nombre_inventaire' => 'required|string|max:255',
            'editeur_id' => 'exists:editeurs,id',
            'nombre_page' => 'required|integer',
            'edition' => 'required|date',
            'isbn' => 'string|max:255',
            'statut' => 'required|in:disponible,réservé,emprunté',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            ];
    }

 /**
     * Personnalise les messages de validation.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'titre.required' => 'Le titre est obligatoire.',
            'titre.string' => 'Le titre doit être une chaîne de caractères.',
            'titre.max' => 'Le titre ne doit pas dépasser 255 caractères.',
    
            'auteur_id.required' => "L'auteur est obligatoire.",
            'auteur_id.exists' => "L'auteur sélectionné est invalide.",
    
            'categorie_id.required' => 'La catégorie est obligatoire.',
            'categorie_id.exists' => 'La catégorie sélectionnée est invalide.',
    
            'nombre_inventaire.required' => "Le nombre d'inventaire est obligatoire.",
            'nombre_inventaire.string' => "Le nombre d'inventaire doit être une chaîne de caractères.",
            'nombre_inventaire.max' => "Le nombre d'inventaire ne doit pas dépasser 255 caractères.",
    
            'editeur_id.exists' => "L'éditeur sélectionné est invalide.",
    
            'nombre_page.required' => 'Le nombre de pages est obligatoire.',
            'nombre_page.integer' => 'Le nombre de pages doit être un nombre entier.',
    
            'edition.required' => "La date d'édition est obligatoire.",
            'edition.date' => "La date d'édition doit être une date valide.",
    
            'isbn.string' => "Le code ISBN doit être une chaîne de caractères.",
            'isbn.max' => "Le code ISBN ne doit pas dépasser 255 caractères.",

            'statut.required' => 'Le statut du livre est obligatoire.',
            'statut.in' => 'Le statut doit être "disponible", "réservé" ou "emprunté".',

            'image.image' => "Le fichier doit être une image.",
            'image.mimes' => "L'image doit être de type : jpg, jpeg, png",
            'image.max' => "L'image ne doit pas dépasser 2 Mo.",
        
        ];
    }
}

