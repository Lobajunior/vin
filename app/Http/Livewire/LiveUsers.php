<?php

namespace App\Http\Livewire;

use App\Models\Team;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use Image as InterventionImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class LiveUsers extends Component
{

    public $currentPage = 1;
    public $id_user ,$nom , $prenom, $contact, $email, 
    $ville , $password, $confirmationPassword , $adresse 
    ,$Selectrole ,$search , $ASmodifPhoto , $profession ,
    $number_commande_user;


    protected $listeners=['SupprimerUtilisateur','addMemberUser'];

    private $validationRules  = [
        1 => [
            "nom" => ['required','max:255','min:3'],
            "prenom" => ['required','max:100','min:3'],
            "email" => ['required','email'],
            "contact" => ['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            "ville" => ['required'],
        ],
        2 => [
            "Selectrole" => ['required'],
            "password" => 'required|string ',
            "confirmationPassword"=> ['required','min:8','same:password'],
        ]
    ];

    //Personnaliser mes message d'erreur
    protected $messages = [
        'nom.required' => 'Entrer un Nom valide',
        'nom.nom' => 'Le nom doit comporter plus de 5 carractere',
        'prenom.required' => 'Entrer un Prenom valide',
        'prenom.min' => 'Le Prenom doit comporter plus de 3 carractere',
        'email.required' => 'Entrer une adresse E-mail valide',
        'email.email' => 'le format de l\'adresse E-mail est invalid',
        'contact.required' => 'un numero de telephone est obligatoire',
        'contact.regex' => 'le Contact est invalid',
        'contact.min' => 'minimum 10 chiffres',
        'ville.required' => 'ce champs est requis',
        'ville.ville' => 'la ville est invalid',
        'password.required' => 'Entrer un password valide',
        'password.password' => 'le Contact est invalid',
        'confirmationPassword.required' => 'Les deux password doivent etre compatible',
        'confirmationPassword.confirmationPassword' => 'mot de passe non compatible',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName , $this->validationRules[$this->currentPage]);
    }


    public $pages = [
        1 => [
            'header' => "Informations personnels",
            'description' => "Entrer vos Informations personnels"
        ],
        2 => [
            'header' => "Informations Confidentielles",
            'description' => "Entrer un Mot de passe correspondant"
        ]
    ];

    public function nextCurrentPage()
    {
        $this->validate($this->validationRules[$this->currentPage]);
       $this->currentPage ++ ;
    }

    public function PrecedenteCurrentPage()
    {
       $this->currentPage--;
    }

    public function createUser()
    {
        $rules = Collect($this->validationRules)->collapse()->toArray();
        $this->validate($rules);

        $user = new User;
        $user->nom = htmlspecialchars($this->nom);
        $user->prenom = htmlspecialchars($this->prenom);
        $user->email = htmlspecialchars($this->email);
        $user->phone = htmlspecialchars($this->contact);
        $user->villes = htmlspecialchars($this->ville);
        $user->profession = htmlspecialchars($this->profession);
        if($this->adresse){
            $user->adresse = htmlspecialchars($this->adresse);
        }
        $user->role = $this->Selectrole;
        $user->password = Hash::make($this->password);
        $user->slug = "SELONTOI".Str::slug(Hash::make($this->email),"-");

        $user->save();

        if($user->save()){

            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',
                'message' => 'Utilisateur creer avec success',
                'text' => "Merci !!"
            ]);

            $this->reset();
            $this->resetValidation();
        }
    }

    public function editUser($id_user)
    {
        $user = User::find($id_user);

        if($user){
            $this->id_user = $user->id ;
            $this->nom = $user->nom ;
            $this->email = $user->email ;
            $this->prenom = $user->prenom;
            $this->ville = $user->villes;
            $this->adresse= $user->adresse;
            $this->contact = $user->phone;
            $this->Selectrole = $user->role;
            $this->profession = $user->profession;
        }
    }

    public function changeUser()
    {
        $user = User::find($this->id_user);

        if($user){
            $user->nom = htmlspecialchars($this->nom);
            $user->prenom = htmlspecialchars($this->prenom);
            $user->email =htmlspecialchars($this->email);
            $user->villes =htmlspecialchars($this->ville);
            if($this->adresse){
                $user->adresse =htmlspecialchars($this->adresse);
            }
            if($this->profession){
                $user->profession =htmlspecialchars($this->profession);
            }
            if($this->Selectrole){
                $user->role =$this->Selectrole;
            }
            $user->phone =htmlspecialchars($this->contact);

            $user->update();
            if($user->update()){

                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',
                    'message' => 'Utilisateur Modifier avec success',
                    'text' => "Merci !!"
                ]);

                $this->reset();
                $this->resetValidation();
                $this->dispatchBrowserEvent('closeModalUserEdit');
            }
        }
    }

    public function deleteUser($id_user)
    {
        $user = User::find($id_user);

        if($user){
            $this->dispatchBrowserEvent('swal:modalDeleteUtilisateurs', [
                'type' => 'warning',
                'text' => "Voulez-vous vraiment suprimer (". $user->nom." ". $user->prenom. "),",
                'title' => "Attention !!",
                'id' => $user->id
            ]);
        }
    }

    public function SupprimerUtilisateur($id_user)
    {
        $user = User::find($id_user);

        if($user){
            $doc_path = "Backend/images/User/$user->photo";
            if (File::exists($doc_path)) {
                File::delete($doc_path);
            }

            $user->delete();

            $this->dispatchBrowserEvent('swal:modalSupprimer', [
                'type' => 'success',
                'text' => "Utilisateur Supprimer ",
                'title' => "Success!!",
            ]);
        }
    }

    public function checkUtilisateur($id_user)
    {
        $user = User::find($id_user);

        if($user){
            $this->id_user = $user->id ;
            $this->nom = $user->nom ;
            $this->email = $user->email ;
            $this->prenom = $user->prenom;
            $this->ASmodifPhoto = $user->photo;
            $this->Selectrole = $user->role;
            $this->contact = $user->phone;
            $this->profession = $user->profession;

            $this->number_commande_user = User::query()
                ->select()
                ->join('commandes','commandes.user_id','=','users.id')
                ->where('users.id',$user->id)
                ->count();
        }
    }


    //Ajouter Comme Membre a Notre Equipe

    public function memberUser($id_user)
    {
        $user = User::find($id_user);

        if($user){
            $this->dispatchBrowserEvent('swal:modalAddMember', [
                'type' => 'success',
                'text' => "Voulez-vous ajouter ". $user->nom . " a votre Team ?",
                'title' => "Ajout a notre equipe",
                'id' => $user->id
            ]);
        }
    }


    public function addMemberUser($id_user)
    {
        $user = User::find($id_user);

        $exist_member = Team::where('email',$user->email)->first();
        if($exist_member){

            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'error',
                'message' => "l'utilisateur avec l'adresse email: ".$user->email."  existe deja dans votre Team",
                'text' => "Attention !!"
            ]);

            return redirect()->back();
        }

        if($user){
            $user->is_member = 1;
            $user->update();

            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',
                'message' => "l'Utilisateur ".$user->nom."".$user->prenom." a bien ete ajouter a votre Team",
                'text' => "Merci !!"
            ]);

        }else{
            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'error',
                'message' => "l'Utilisateur n'a pas ete trouver",
                'text' => "Attention !!"
            ]);
        }

    }

    public function render()
    {
        return view('livewire.live-users',[
            'utilisateur' =>  User::Where('users.prenom','LIKE','%'.$this->search.'%')->where('role','utilisateurs')->OrWhere('role','SuperAdmin')->get(),
        ]);
    }
}
