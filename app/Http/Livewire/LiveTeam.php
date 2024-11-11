<?php

namespace App\Http\Livewire;

use App\Models\Team;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Image;
use Image as InterventionImage;
use Illuminate\Support\Facades\File;

class LiveTeam extends Component
{
    use WithFileUploads;

    public  $profession , $adresse , $contact , $prenom , $ville , $email , $nom , $id_team ;
    public  $Aspp = NULL ;

    protected $listeners = ['SuprimerTeam','PopupTeam'];


    protected $rules=[
        'nom' =>  ['required','min:3'],
        'profession' =>  ['required'],
        'adresse' =>  ['required'],
        'contact' =>  ['required'],
        'prenom' =>  ['required','min:4'],
        'ville' =>  ['required'],
        'email' =>  ['required'],
    ];

    protected $messages = [
        'nom.required' => "Un Nom  est requis",
        'nom.nom' => "Minimum 3 caractere",
        'profession.required' => "Une profession  est requise",
        'profession.profession' => "Minimum 3 caractere",
        'prenom.required' => "Un prenom  est requis",
        'prenom.prenom' => "Minimum 3 caractere",
        'email.required' => "Un email  est requis",
        'email.email' => "Veuillez entrer un format de mail correcte",
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function create_Team()
    {
        $this->validate();

        $team = new Team ;
        $team->nom = $this->nom;
        $team->profession = $this->profession;
        $team->adresse = $this->adresse;
        $team->phone = $this->contact;
        $team->prenom = $this->prenom;
        $team->email = $this->email;
        $team->ville = $this->ville;

        if ($this->Aspp) {
            $img = $this->Aspp;
                $photo_team = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'Backend/images/Team/'.$photo_team;
                InterventionImage::make($source)->fit(167,167)->save($target);//taille de la banner a chercher
                $team->photo   =  $photo_team;
        }

        $team->slug =  "SELONTOI".Str::slug("$this->nom".Hash::make($this->nom),"-");  

        $team->save();

        if($team->save()){
            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',  
                'message' => 'Un Membre a ete  Enregistrer avec success', 
                'text' => "Merci Bien !!"
            ]);
            
            $this->reset();
        }
    }

    public function edit_Team($id_team)
    {
        $team = Team::find($id_team);
        if($team){
            $this->id_team = $team->id ;
            $this->nom = $team->nom ;
            $this->profession = $team->profession ;
            $this->email = $team->email ;
            $this->ville = $team->ville ;
            $this->prenom = $team->prenom ;
            $this->contact = $team->phone ;
            $this->adresse = $team->adresse ;
        }
    }

    public function changeTeam()
    {
        $team = Team::find($this->id_team);
        if($team){
            $team->nom = $this->nom ;
            $team->profession = $this->profession ;
            $team->email = $this->email ;
            $team->ville = $this->ville ;
            $team->prenom = $this->prenom ;
            $team->phone = $this->contact ;
            $team->adresse = $this->adresse ;

            if ($this->Aspp) {
                $doc_path = "Backend/images/Team/$team->photo";
                if (File::exists($doc_path)) {
                    File::delete($doc_path);
                }

                $img = $this->Aspp;
                    $photo_team = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'Backend/images/Team/'.$photo_team;
                    InterventionImage::make($source)->fit(167,167)->save($target);//taille de la photo a chercher
                    $team->photo   =  $photo_team;
            }

            $team->update();

            if($team->update()){
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',  
                    'message' => 'Un Membre vient d\'etre modifier', 
                    'text' => "Merci Bien !!"
                ]);
                
                $this->reset();
                $this->dispatchBrowserEvent('closeModalEditTeam');
            }
        }
    }


    public function deleteTeam($id_team)
    {
        $team = Team::find($id_team);
        if($team){
            $this->dispatchBrowserEvent('swal:modalDeleteTeam', [
                'type' => 'warning',  
                'text' => "Etes vous sur de vouloir suprimer ce membre ". $team->nom . " ?",
                'title' => "Attention !",
                'id' => $team->id
            ]);
        }
    }

    public function SuprimerTeam($id_team)
    {
        $team = Team::find($id_team);
        if($team){
            $doc_path = "Backend/images/Team/$team->photo";
            if (File::exists($doc_path)) {
                File::delete($doc_path);
            }

            $team->delete();

            $this->dispatchBrowserEvent('swal:modalSupprimer', [
                'type' => 'success',  
                'text' => "Membre Supprimer avec Succes",
                'title' => "Success",
            ]);
        }
    }


    public function createUser_atTeam($id_team)
    {
        $team = Team::find($id_team);
        if($team){
            $this->dispatchBrowserEvent('swal:popupCreateUseratTeam', [
                'type' => 'info',  
                'text' => "voulez-vous creer un compte utilisateur pour : ". $team->nom . " ?",
                'title' => "Compte Utilisateur !",
                'id' => $team->id
            ]);
        }
    }

    public function PopupTeam($id_team)
    {
        $team = Team::find($id_team);
        if($team){

            $user_exist = User::where('email',$team->email)->where('nom',$team->nom)->where('phone',$team->phone)->first();
            if($user_exist){
                $this->dispatchBrowserEvent('swal:modalSupprimer', [
                    'type' => 'warning',  
                    'text' => "Un compte Utilisateur existe deja pour".$team->nom." !",
                    'title' => "Compte Existant ",
                ]);

                return redirect(request()->header('Referer'));
            }

            $user = new User;
            $user->nom = $team->nom;
            $user->prenom = $team->prenom;
            $user->email = $team->email;
            $user->phone = $team->phone;
            $user->photo = $team->photo;
            $user->villes = $team->ville;
            $user->profession = $team->profession;
            $user->adresse = $team->adresse;
            $user->role = "Utilisateurs";
            $user->password = Hash::make("123456789");
            $user->slug = "SELONTOI".Str::slug(Hash::make($team->nom),"-");

            $user->save();
            if($user->save()){
                $this->dispatchBrowserEvent('swal:modalSupprimer', [
                    'type' => 'success',  
                    'text' => "Un compte utilisateur a bien ete creer pour ".$user->nom." !",
                    'title' => "Compte creer avec succes ",
                ]);
            }
        }
    }

    public function render()
    {
        return view('livewire.live-team',[
            'user_member' => User::where('is_member',1)->get(),
            'membre' => Team::all(),
        ]);
    }
}
