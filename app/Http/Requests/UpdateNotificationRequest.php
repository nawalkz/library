<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotificationRequest extends FormRequest
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
           'message' => 'required|string|min:5',
                'livre_id' => 'required|string|max:255',
                'user_id' => 'required|exists:etudiants,id',
        ];
    }
    public function messages(): array
    {
        return [


            'message.required' => 'Le message est obligatoire.',
             'message.min' => 'Le message doit contenir au moins 5 caractères.',

            'livre_id.required' => 'Le livre est obligatoire.',
            'livre_id.max' => 'Le livre ne doit pas dépasser 255 caractères.',
            
            'user_id.required' => 'Veuillez sélectionner un étudiant.',
            'user_id.exists' => "L'étudiant sélectionné n'existe pas.",
        ];
    }
}

