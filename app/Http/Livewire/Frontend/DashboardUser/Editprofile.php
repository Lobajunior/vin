<?php

namespace App\Http\Livewire\Frontend\DashboardUser;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Editprofile extends Component
{
    public $nom , $prenom, $adresse, $ville ,$contact,$genre, $email ,$profession, $id_user ,$photo_profile ;
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
            $this->genre = $user->genre;
            $this->profession = $user->profession;
        }else{
            return redirect()->to('/login');
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
            if($this->genre){
                $user->genre = $this->genre;
            }
            if($this->profession){
                $user->profession = $this->profession;
            }
            

            $user->update();

            if($user->update()){
                $this->dispatchBrowserEvent('closemodaleditprofileFrontend');
                $this->dispatchBrowserEvent('NotifySuccess', [
                    'type' => 'success',  
                    'message' => 'modification effectuer avec succes ', 
                ]);
            }else{
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'error',  
                    'message' => "Une Erreur c'est produite", 
                    'text' => "Ouupppss !!"
                ]);
            }
        }else{
            return redirect()->to('/login');
        }
    }


    public function render()
    {
        return view('livewire.frontend.dashboard-user.editprofile');
    }
}
