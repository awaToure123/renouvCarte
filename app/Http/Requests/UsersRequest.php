<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'profile'=>'nullable|image:png,jpg,jpeg',
            'email'=>'nullable|email|unique:users,email',
            'password'=>'required|min:4',
            'password_confirm'=>'required|min:4'

        ];
    }

      /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'nom.required'=>'Le nom est requis',
            'prenom.required'=>'Le prenom est requis ',
            'profile.image'=>'Le format de l image ou type d image invalide',
            'email.email'=>'L email doit etre de  type Ex : test@gmai.com',
            'email.unique'=>'L email existe déjà dans la base de données',
            'password.required'=>'Le mot de passe est requis',
            'password_confirm.required'=>'Le mot de passe de confirmation est requis4',
            'password.min'=>'Le mot de passe est doit avoir aumoins 4 caractère',
            'password_confirm.min'=>'Le mot de passe est doit avoir aumoins 4 caractère',

        ];
    }
}
