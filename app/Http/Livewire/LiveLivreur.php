<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class LiveLivreur extends Component
{

    public $id_user;
    public $nom , $prenom, $contact, $email, $ville , $adresse ,$search , $ASmodifPhoto , $profession;


    protected $listeners=['SupprimerUtilisateur'];


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
        }
    }
    
    public function changeUser()
    {
        $user = User::find($this->id_user);

        if($user){
            $user->nom = $this->nom;
            $user->prenom = $this->prenom;
            $user->email =$this->email;
            $user->villes =$this->ville;
            if($this->adresse){
                $user->adresse =$this->adresse;
            }
            $user->phone =$this->contact;

            $user->update();
            if($user->update()){

                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',  
                    'message' => 'Livreur Modifier avec success', 
                    'text' => "Merci !!"
                ]);
    
                $this->reset();
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
                'text' => "Livreur Supprimer ",
                'title' => "Success!!",
            ]);
        }
    }

    public function checkLivreurLive($id_user)
    {
        $user = User::find($id_user);

        if($user){
            $this->nom = $user->nom ;
            $this->prenom = $user->prenom ;
            $this->profession = $user->profession ;
            $this->ASmodifPhoto = $user->photo ;
        }
    }


    public function render()
    {
        return view('livewire.live-livreur',[
            'utilisateur' =>  User::Where('users.prenom','LIKE','%'.$this->search.'%')->where('role','Livreurs')->get(),
        ]);
    }
}
