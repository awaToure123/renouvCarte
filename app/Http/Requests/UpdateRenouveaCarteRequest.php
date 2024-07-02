<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRenouveaCarteRequest extends FormRequest
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
        'id'=> 'required',
           'renouveauCarte'=> 'required|mimes:pdf',
        ];
    }

    public  function messages():array {
        return [
            'renouveauCarte.mimes'=>'Le fichier doit etre de format pdf',
            'renouveauCarte.required'=>'Le fichier est requis dans le formulaire',

        ];
    }
}
