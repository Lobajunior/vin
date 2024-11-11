<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Image;
use Image as InterventionImage;

class LiveProfileUser extends Component
{

    use WithFileUploads;

    public $nom , $prenom, $adresse, $ville ,$contact, $email ,$id_user ,$photo_profile ;
    public $AsphotoProfile = NULL ;

    public function mount()
    {
        $user = Auth::user();

        if($user){
            $this->id_user = $user->id ;
            $this->nom = $user->nom;
            $this->prenom = $user->prenom;
            $this->ville = $user->villes;
            $this->adresse = $user->adresse;
            $this->email = $user->email ;
            $this->contact = $user->phone;
            $this->photo_profile = $user->photo;
        }
    }

    public function changeUser()
    {
        $user = Auth::user();

        if($user){
            if($this->nom){
                $user->nom = $this->nom;
            }
            if($this->prenom){
                $user->prenom = $this->prenom ;
            }
            if($this->ville){
                $user->villes = $this->ville;
            }
            if($this->adresse){
                $user->adresse = $this->adresse ;
            }
            if($this->email){
                $user->email = $this->email ;
            }
            if($this->contact){
                $user->phone = $this->contact;
            }

            $user->update();

            if($user->update()){
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',  
                    'message' => 'Vos Informations ont bien ete Modifier.', 
                    'text' => "Merci  !!"
                ]);
            }else{
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'error',  
                    'message' => "Une Erreur c'est produite", 
                    'text' => "Ouupppss !!"
                ]);
            }
        }
    }

    public function changeProfilePicture()
    {
        $user = Auth::user();

        if($user){

            if ($this->AsphotoProfile) {
                $img = $this->AsphotoProfile;
                    $profile_user = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'Backend/images/User/'.$profile_user;
                    InterventionImage::make($source)->fit(128,128)->save($target);//taille de la photo a chercher
                    $user->photo   =  $profile_user;
            }
        }

        $user->update();

        if($user->update()){
            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',  
                'message' => 'Photo de profile Modifier.', 
                'text' => "Merci  !!"
            ]);
        }
    }
    public function render()
    {
        return view('livewire.live-profile-user');
    }
}
