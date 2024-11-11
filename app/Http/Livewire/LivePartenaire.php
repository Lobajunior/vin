<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Partenaire;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use Livewire\WithFileUploads;
use Image as InterventionImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class LivePartenaire extends Component
{
    use WithFileUploads;

    public $nom , $email , $contact,$id_partenaire ;
    public $ASlogo = NULL ;
    public $ToggleAjoutLogo = FALSE ;

    protected $listeners = ['SupprimerPartenaire'];

    protected $rules=[
        'nom' =>  ['required','min:2']
    ];

    protected $messages = [
        'nom.required' => "Un Nom de categorie est requis",
        'nom.nom' => "Minimum 2 caractere",
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function changeToggleAjoutLogo()
    {
        $this->ToggleAjoutLogo = !$this->ToggleAjoutLogo;
    }

    public function create_partenaire()
    {
        $this->validate();

        $partenaire = new Partenaire;
        $partenaire->nom = $this->nom ;
        if($this->email){
            $partenaire->email = $this->email ;
        }
        if($this->contact){
            $partenaire->contact = $this->contact ;
        }
        if ($this->ASlogo) {
            $img = $this->ASlogo;
            $logo_partenaire = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
            $source = $img;
            $target = 'Backend/images/Partenaire/'.$logo_partenaire;
            InterventionImage::make($source)->fit(100,33)->save($target);//taille du logo a chercher
            $partenaire->logo   =  $logo_partenaire;
        }
        $partenaire->slug = "SELONTOI-Partenaire".Str::slug("$this->nom".Hash::make($this->nom),"-");

        $partenaire->save();
        if($partenaire->save()){
            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',  
                'message' => 'Partenaire Enregistrer avec success', 
                'text' => "Merci  !!"
            ]);
            
            $this->reset();
        }
    }

    public function editPartenaire($id_partenaire)
    {
        $partenaire = Partenaire::find($id_partenaire);
        if($partenaire){
            $this->id_partenaire = $partenaire->id;
            $this->nom = $partenaire->nom ;
            $this->email = $partenaire->email ;
            $this->contact = $partenaire->contact ;
        }
    }

    public function changePartenaire()
    {
        $partenaire = Partenaire::find($this->id_partenaire);
        if($partenaire){
            $partenaire->nom = $this->nom ;
            if($this->email){
                $partenaire->email = $this->email ;
            }
            if($this->contact){
                $partenaire->contact = $this->contact ;
            }

            if ($this->ASlogo) {
                $doc_path = "Backend/images/Partenaire/$partenaire->logo";
                if (File::exists($doc_path)) {
                    File::delete($doc_path);
                }

                $img = $this->ASlogo;
                $logo_partenaire = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'Backend/images/Partenaire/'.$logo_partenaire;
                InterventionImage::make($source)->fit(100,33)->save($target);//taille du logo a chercher
                $partenaire->logo   =  $logo_partenaire;
            }

            $partenaire->update();
            if($partenaire->update()){
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',  
                    'message' => 'Partenaire Modifier ', 
                    'text' => "Merci  !!"
                ]);
                
                $this->reset();
                $this->dispatchBrowserEvent('closeModalEditPartenaire');
            }

        }
    }

    public function deletePartenaire($id_partenaire)
    {
        $partenaire = Partenaire::find($id_partenaire);

        if($partenaire){
            $this->dispatchBrowserEvent('swal:modalDeletePartenaire', [
                'type' => 'warning',  
                'text' => "Etes vous sur de vouloir suprimer ce partenaire ". $partenaire->nom . " ?",
                'title' => "Attention !",
                'id' => $partenaire->id
            ]);
        }
    }

    public function SupprimerPartenaire($id_Partenaire)
    {
        $partenaire = Partenaire::find($id_Partenaire);
        
        if($partenaire){  
            $doc_path = "Backend/images/Partenaire/$partenaire->banner";
            if (File::exists($doc_path)) {
                File::delete($doc_path);
            }

            $partenaire->delete();

            $this->dispatchBrowserEvent('swal:modalSupprimer', [
                'type' => 'success',  
                'text' => "Partenaire Supprimer avec Succes",
                'title' => "Success",
            ]);

        }
        
    }

    public function render()
    {
        return view('livewire.live-partenaire',[
            'partners' => Partenaire::all()
        ]);
    }
}
