<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categorie;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Image;
use Image as InterventionImage;
use Illuminate\Support\Facades\File;


class LiveCategorie extends Component
{
    use WithFileUploads;

    public $libelle, $description , $id_categorie, $search;
    public $asLogo = null ;
    public $AsBanner = null ;
    public $ToggleAddlogo = false ;


     protected $queryString =[
        'search' => ['except'=> '']
    ];

    protected $listeners = ['SupprimerCategorie'];


    protected $rules=[
        'libelle' =>  ['required','min:3']
    ];

    protected $messages = [
        'libelle.required' => "Un Nom de categorie est requis",
        'libelle.libelle' => "Minimum 3 caractere",
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function changeToggleAddlogo()
    {
        $this->ToggleAddlogo = !$this->ToggleAddlogo;
    }


    public function create_categorie(){
        $this->validate();

        $categorie = new Categorie;
        $categorie->libelle = $this->libelle;
        if($this->description){
            $categorie->description = $this->description;
        }

        if ($this->AsBanner) {
            $img = $this->AsBanner;
                $banniere_categorie = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'Backend/images/Categorie/'.$banniere_categorie;
                InterventionImage::make($source)->fit(376,231)->save($target);//taille de la banner a chercher
                $categorie->banner   =  $banniere_categorie;
        }

        if ($this->asLogo) {
            $img = $this->asLogo;
                $logo_categorie = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'Backend/images/Categorie/'.$logo_categorie;
                InterventionImage::make($source)->fit(130,130)->save($target);//taille de la banner a chercher
                $categorie->logo   =  $logo_categorie;
        }

        $categorie->slug =  "SELONTOI".Str::slug("$this->libelle".Hash::make($this->libelle),"-");

        $categorie->save();
            if($categorie->save()){

                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',
                    'message' => 'Categorie Enregistrer avec success',
                    'text' => "Merci Bien !!"
                ]);

                $this->reset();
            }else{

                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'error',
                    'message' => "Une Erreur c'est produite",
                    'text' => "Ouupppss !!"
                ]);

            }
    }

    public function editCategorie($id_categorie){
        $categorie = Categorie::find($id_categorie);
        if($categorie){
            $this->id_categorie = $categorie->id;
            $this->libelle = $categorie->libelle;
            $this->description = $categorie->description;
        }
    }

    public function updateCategorie(){
        $categorie = Categorie::find($this->id_categorie);

        $this->validate();
        if($categorie){
            $categorie->libelle = $this->libelle;
            if($this->description){
                $categorie->description = $this->description;
            }

            if ($this->AsBanner) {

                $doc_path = "Backend/images/Categorie/$categorie->banner";
                if (File::exists($doc_path)) {
                    File::delete($doc_path);
                }


                $img = $this->AsBanner;
                    $banniere_categorie = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'Backend/images/Categorie/'.$banniere_categorie;
                    InterventionImage::make($source)->fit(376,231)->save($target);//taille de la banner a chercher
                    $categorie->banner   =  $banniere_categorie;
            }else{
                $categorie->banner   =  $categorie->banner;
            }

            if ($this->asLogo) {

                $doc_path = "Backend/images/Categorie/$categorie->logo";
                if (File::exists($doc_path)) {
                    File::delete($doc_path);
                }

                $img = $this->asLogo;
                    $logo_categorie = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'Backend/images/Categorie/'.$logo_categorie;
                    InterventionImage::make($source)->fit(130,130)->save($target);//taille de la banner a chercher
                    $categorie->logo   =  $logo_categorie;
            }else{
                $categorie->logo   =  $categorie->logo;
            }

            $categorie->update();
            if($categorie->update()){
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'info',
                    'message' => 'Categorie Modifier avec success',
                    'text' => "Merci Bien !!"
                ]);

                $this->reset();
            }else{
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'error',
                    'message' => "Une Erreur c'est produite",
                    'text' => "Ouupppss !!"
                ]);
            }
        }
    }


    public function deleteCategorie($id_categorie)
    {
        $categorie = Categorie::find($id_categorie);

        if($categorie){
            $this->dispatchBrowserEvent('swal:modalDeleteCategorie', [
                'type' => 'warning',
                'text' => "Etes vous sur de vouloir suprimer cette Categorie ". $categorie->libelle . " ?",
                'title' => "Attention !",
                'id' => $categorie->id
            ]);
        }
    }


    public function SupprimerCategorie($id_categorie)
    {
        $categorie = Categorie::find($id_categorie);

        if($categorie){
            $doc_path = "Backend/images/Categorie/$categorie->banner";
            if (File::exists($doc_path)) {
                File::delete($doc_path);
            }

            $categorie->delete();

            $this->dispatchBrowserEvent('swal:modalSupprimer', [
                'type' => 'success',
                'text' => "Categorie Supprimer avec Succes",
                'title' => "Success",
            ]);

        }

    }

    function active_the_best_categorie($idCategorie) : void {
        $categorie = Categorie::find($idCategorie);
        if($categorie){
            $categorie->is_best == 0 ? $categorie->is_best = 1 : $categorie->is_best = 0 ;
            $categorie->update();

            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => $categorie->is_best == 1 ? 'success' : 'info',  
                'message' => $categorie->is_best == 1 ?'Activer en tant que meilleur Categorie' : 'Categorie desactiver des meilleurs', 
                'text' => "Action effectuer !!"
            ]);
        }
    }

    public function render()
    {
        return view('livewire.live-categorie',[
            'categorie' => Categorie::Where('libelle','LIKE','%'.$this->search.'%')->OrderBy('libelle','DESC')->get()
        ]);
    }
}
