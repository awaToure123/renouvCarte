<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updatePertesCartesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'extrait_naissance' => 'nullable|mimes:pdf',
            'certificat_de_perte' => 'nullable|mimes:pdf',
            'ancienne_carte' => 'nullable|mimes:pdf',
            'date_perte' => 'nullable',
            'id' => 'required',
        ];
    }

    public function messages(): array {
        return [
            'extrait_naissance.mimes' => 'L\'extrait de naissance doit être un fichier de type pdf.',
            'certificat_de_perte.mimes' => 'Le certificat de perte doit être un fichier de type pdf.',
            'ancienne_carte.mimes' => 'L\'ancienne carte doit être un fichier de type pdf.',
            'id.required' => 'L\'identifiant est obligatoire.',
        ];
    }
}
