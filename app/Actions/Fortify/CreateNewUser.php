<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        Validator::make($input, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' =>  ['required'],
            'contact' =>  ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            'email' => [ 'required','string','email','max:255',Rule::unique(User::class),],
            "ville" => ['required'],
            "password" => 'required|string|min:8',
        ])->validate();

        
        return User::create([
            'nom' => $input['nom'],
            'prenom' => $input['prenom'],
            'phone' => $input['contact'],
            'villes' => $input['ville'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'slug' => "SELONTOI-user".Hash::make($input['email']),
        ]);
    }
}
