<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
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
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'required|email',
            'tel'=>'required',
            'age'=>'required',
            'password'=>'nullable',
            'password_confirm'=>'nullable',
            'id'=>'required'
        ];
    }

    public  function messages():array {
        return [
'nom.required'=>'Le nom est requis',
        'prenom'=>'Le prénom est requis',
        'email.email'=>'L email n est pas du bon format',
        'email.required'=>'L email est requis ',
        'tel'=>'Le numéro de téléphone est requis',
        'age'=>'L age est resquis'
        ];
    }
}
