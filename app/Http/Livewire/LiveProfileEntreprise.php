<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use Livewire\WithFileUploads;
use Image as InterventionImage;
use Illuminate\Support\Facades\Hash;

class LiveProfileEntreprise extends Component
{

    use WithFileUploads;


    public $nom ,$nom_gerant ,$prenom_gerant,
            $ville_gerant,  $ville ,
            $adresse_gerant, $adresse ,
            $email_gerant, $email,
            $contact_gerant, $contact,
             $AsphotoExist ,$ASphotoGerantExist,
              $id_entreprise, $id_gerant ;
    public $ASLogo = NULL ;
    public $ASphotoGerant = NULL ;

    public function mount()
    {
        $entreprise = User::where('role','Entreprise')->first();
        $gerant = User::where('role','Gerant')->first();

        if($entreprise){
            $this->id_entreprise = $entreprise->id ;
            $this->nom = $entreprise->nom;
            $this->ville = $entreprise->villes;
            $this->adresse = $entreprise->adresse;
            $this->email = $entreprise->email ;
            $this->contact = $entreprise->phone;
            $this->AsphotoExist = $entreprise->photo;

        }else{
            $this->id_entreprise = 1 ;
            $this->nom = "Aucun";
            $this->ville = "Aucun";
            $this->adresse = "Aucun";
            $this->email = "Aucun" ;
            $this->contact = "Aucun";
            $this->AsphotoExist = "Aucun";
        }


        if($gerant){
            $this->id_gerant = $gerant->id ;
            $this->nom_gerant = $gerant->nom;
            $this->prenom_gerant = $gerant->prenom;
            $this->ville_gerant = $gerant->villes;
            $this->adresse_gerant = $gerant->adresse;
            $this->email_gerant = $gerant->email ;
            $this->contact_gerant = $gerant->phone;
            $this->ASphotoGerantExist = $gerant->photo;
        }
    }

    protected $rules=[
        'nom' =>  ['required','min:3']
    ];

    public function editprofileGerant()
    {
        $gerant = User::where('role','Gerant')->first();

        if($gerant){
            $this->id_gerant = $gerant->id ;
            $this->nom_gerant = $gerant->nom;
            $this->prenom_gerant = $gerant->prenom;
            $this->ville_gerant = $gerant->villes;
            $this->adresse_gerant = $gerant->adresse;
            $this->email_gerant = $gerant->email ;
            $this->contact_gerant = $gerant->phone;
        }
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function modifyEntreprise()
    {
        $entreprise = User::where('role','Entreprise')->first();

        if($entreprise){
            if($this->nom){
                $entreprise->nom = $this->nom ;
            }
            if( $this->ville){
            $entreprise->villes = $this->ville ;
            }
            if($this->adresse){
            $entreprise->adresse = $this->adresse ;
            }
            if($this->email){
            $entreprise->email = $this->email ;
            }
            if($this->contact){
            $entreprise->phone = $this->contact ;
            }
            if ($this->ASLogo) {
                $img = $this->ASLogo;
                    $photo_entreprise = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'Backend/images/User/'.$photo_entreprise;
                    InterventionImage::make($source)->fit(150,150)->save($target);//taille de la banner a chercher
                    $entreprise->photo   =  $photo_entreprise;
            }

            $entreprise->update();

            if($entreprise->update()){
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',  
                    'message' => 'Informations Modifier.', 
                    'text' => "Merci  !!"
                ]);
            }else{
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'error',  
                    'message' => "Une Erreur c'est produite", 
                    'text' => "Ouupppss !!"
                ]);
            }
        }else{

            $photo = NULL ;
            if ($this->ASLogo) {
                $img = $this->ASLogo;
                    $photo_entreprise = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'Backend/images/User/'.$photo_entreprise;
                    InterventionImage::make($source)->fit(150,150)->save($target);//taille de la banner a chercher
                $photo = $photo_entreprise ;
                }
                

            $new_entreprise = User::create([
                'nom' => htmlspecialchars($this->nom) ,
                'prenom' => "entreprise",
                'villes' =>  htmlspecialchars($this->ville) ,
                'adresse' => htmlspecialchars($this->adresse) ,
                'email' => htmlspecialchars($this->email),
                'phone' => htmlspecialchars($this->contact),
                'photo' => $photo,
                'role' => "Entreprise",
                'slug' => "SELONTOI".Str::slug(Hash::make($this->email),"-"),
                'password' => 123456789 
            ]);

            $new_entreprise->save();

            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',  
                'message' => 'Informations Modifier avec succes.', 
                'text' => "Merci  !!"
            ]);
        }
    }

    public function modifyGerant()
    {
        $gerant = User::where('role','Gerant')->first();
        if($gerant){
            if($this->nom_gerant){
                $gerant->nom = $this->nom_gerant ;
            }
            if($this->prenom_gerant){
                $gerant->prenom = $this->prenom_gerant ;
            }
            if( $this->ville_gerant){
            $gerant->villes = $this->ville_gerant ;
            }
            if($this->adresse_gerant){
            $gerant->adresse = $this->adresse_gerant ;
            }
            if($this->email_gerant){
            $gerant->email = $this->email_gerant ;
            }
            if($this->contact_gerant){
            $gerant->phone = $this->contact_gerant ;
            }
            if ($this->ASphotoGerant) {
                $img = $this->ASphotoGerant;
                    $photo_gerant = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'Backend/images/User/'.$photo_gerant;
                    InterventionImage::make($source)->fit(150,150)->save($target);//taille de la banner a chercher
                    $gerant->photo   =  $photo_gerant;
            }

            $gerant->update();

            if($gerant->update()){
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',  
                    'message' => 'Informations du Gerant Modifier.', 
                    'text' => "Merci  !!"
                ]);

                $this->dispatchBrowserEvent('closeModalModifGerant');
            }else{
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'error',  
                    'message' => "Une Erreur c'est produite", 
                    'text' => "Ouupppss !!"
                ]);
            }
        }else{

            $photo = NULL ;
            if ($this->ASphotoGerant) {
                $img = $this->ASphotoGerant;
                    $photo_gerant = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'Backend/images/User/'.$photo_gerant;
                    InterventionImage::make($source)->fit(150,150)->save($target);//taille de la banner a chercher
                    $photo  =  $photo_gerant;
            }

            $new_gerant = User::create([
                'nom' => htmlspecialchars($this->nom_gerant) ,
                'prenom' => htmlspecialchars($this->prenom_gerant),
                'villes' =>  htmlspecialchars($this->ville_gerant) ,
                'adresse' => htmlspecialchars($this->adresse_gerant) ,
                'email' => htmlspecialchars($this->email_gerant),
                'phone' => htmlspecialchars($this->contact_gerant),
                'photo' => $photo,
                'role' => "Gerant",
                'slug' => "SELONTOI".Str::slug(Hash::make($this->email_gerant),"-"),
                'password' => 123456789 
            ]);

            $new_gerant->save();

            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',  
                'message' => 'Informations du gerant Modifier avec succes.', 
                'text' => "Merci  !!"
            ]);


        }
    }

    public function render()
    {
        return view('livewire.live-profile-entreprise',[
            'user_entreprise' => User::where('role','Entreprise')->first()
        ]);
    }
}
