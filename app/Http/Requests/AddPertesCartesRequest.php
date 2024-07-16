<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPertesCartesRequest extends FormRequest
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
            'extrait_naissance' => 'required|mimes:pdf',
            'certificat_de_perte' => 'required|mimes:pdf',
            'ancienne_carte' => 'required|mimes:pdf',
            'date_perte' => 'required',
            'id'=>'required'
        ];
    }

    public function messages(): array{
        return [
            'extrait_naissance.required' => 'L extrait de naissance est requis',
            'certificat_de_perte.required' => 'Le certificat de perte est requis',
            'ancienne_carte.required' => 'L ancienne carte  est requis',
            'date_perte.required' => 'La date de perte de la carte est requis',
            'id'=>'required',
            'extrait_naissance.mimes' => 'L extrait de naissance doit etre de type pdf',
            'certificat_de_perte.mimes' => 'Le certificat de perte doit etre de type pdf',
            'ancienne_carte.mimes' => 'L ancienne carte  doit etre de type pdf'
        ];
    }
}
