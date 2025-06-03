<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'firstname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ];   
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom est requis',
            'lastname.required' => 'Le prenom est requis',
            'email.required' => 'Le mail est requis',
            'email.email' => 'Mauvais format de l\'email',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'password.required' => 'Le mot de passe est requis'
        ];
    }
}
