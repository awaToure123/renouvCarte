<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DemandeRequest extends FormRequest
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
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required|email|unique:demandeurs,email',
            'tel'=>'required|unique:demandeurs,tel',
            'password'=>'required',
            'password_confirm'=>'required',



        ];
    }


    public function messages(): array{
        return [
            'nom.required'=>'Le champs nom est obligatoire',
            'prenom.required'=>'Le champs prenom est obligatoire',
            'tel.required'=>'Le champs téléphone est obligatoire',
            'tel.unique'=>'Le numéro existes déjà dans la base de données',
            'email.unique'=>'L email existes déjà dans la base de données',
            'email.required'=>'L email est obligatoire',
            'password.min'=>'Le mot de passe doit avoir plus de 5 caractères',
            'password.required'=>'Le mot de passe est obligatoire',
            'password_confirm.min'=>'Le mot de passe doit avoir plus de 5 caractères',
            'password_confirm.required'=>'Le mot de passe est obligatoire',

        ];
    }
}
