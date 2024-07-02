<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateDemandeCarteRequest extends FormRequest
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
            'photo'=> 'nullable|image:png,jpg,png',
            'acte_naissance'=> 'nullable|mimes:pdf',
            'certificat_residence'=> 'nullable|mimes:pdf',
            'piece_pere'=> 'nullable|mimes:pdf',
            'piece_mere'=> 'nullable|mimes:pdf',
            'id'=> 'required|exists:demande_cartes,id',
        ];
    }

    public function messages(): array{
        return [
            'photo.image' => 'La photo doit être une image de type png ou jpg.',
            'acte_naissance.mimes' => 'L\'acte de naissance doit être un fichier de type pdf.',
            'certificat_residence.mimes' => 'Le certificat de résidence doit être un fichier de type pdf.',
            'piece_pere.mimes' => 'La pièce du père doit être un fichier de type pdf.',
            'piece_mere.mimes' => 'La pièce de la mère doit être un fichier de type pdf.',
            'id.required' => 'L\'identifiant est obligatoire.',
        ];
    }
}
