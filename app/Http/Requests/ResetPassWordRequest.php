<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassWordRequest extends FormRequest
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
            'emailOrTel'=>'required',
            'password'=>'required|min:4',
            'password_confirm'=>'required|min:4',
        ];
    }

    public function messages():array {

        return [
            'emailOrTel.required'=> 'Identifiant est requis !',
            'password.required'=> 'Le mot de passe est requis !',
            'password_confirm.required'=> 'La confirmation du mot de passe est requis !',
            'password_confirm.min'=> 'Le mot de passe de confirmation minimun 4 caractère !',
            'password.min'=> 'Le mot de passe de  minimun 4 caractère !',
        ];
    }
}
