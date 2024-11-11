<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class LiveRegister extends Component
{

    public $nom , $prenom, $contact , $email , $ville, $genre ,$adresse , $profession , $password , $confirm_password ;

    protected $rules=[
        'nom' =>  ['required','min:2','string'],
        'prenom' =>  ['required'],
        'contact' =>  ['required','min:08','max:10'],
        'email' =>  ['required','email'],
        "ville" => ['required'],
        "password" => 'required|string|min:8',
        "confirm_password"=> ['required','min:8','same:password'],
    ];

    protected $messages = [
        'nom.required' => "Ce champs est obligatoire",
        'nom.nom' => "Minimum 3 caractere",
        'prenom.required' => "Ce champs est obligatoire",
        'contact.required' => "Ce champs est obligatoire",
        'contact.contact' => "Ex: +225......9897",
        'email.required' => 'Entrer une adresse E-mail valide',
        'email.email' => 'le format de l\'adresse est invalid',
        'ville.required' => 'Entrer Votre ville',
        'ville.ville' => 'veuillez verifier ce champ',
        'password.required' => 'Entrer un password valide',
        'password.password' => 'le Contact est invalid',
        'confirm_password.required' => 'Les deux password doivent etre compatible',
        'confirm_password.confirm_password' => 'mot de passe non compatible',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.frontend.live-register');
    }
}
