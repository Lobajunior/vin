<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Livewire\Component;
use App\Models\Categorie;
use Illuminate\Support\Str;
use App\Models\SousCategorie;
use Intervention\Image\Image;
use Livewire\WithFileUploads;
use Image as InterventionImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class LiveSousCategorie extends Component
{
    use WithFileUploads;

    public $libelle , $id_souscategorie , $selectCategorie ;
    public $productAtSouscat = NULL ;
    public $ASphoto = NULL ;
    public $ASphotomodif  ;
    public $ToggleAjoutPhoto = FALSE ;


    protected $listeners =['SupprimerSousCategorie'];

    protected $rules=[
        'libelle' =>  ['required','min:3'],
        'selectCategorie' =>  ['required']
    ];

    protected $messages = [
        'libelle.required' => "Un Nom de Sous categorie est requis",
        'libelle.libelle' => "Minimum 3 caractere",
        'selectCategorie.required' => "selectionnez une categorie !!",
        'selectCategorie.selectCategorie' => "Minimum une categorie",
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function changeToggleAjoutPhoto()
    {
        $this->ToggleAjoutPhoto = !$this->ToggleAjoutPhoto ;
    }

    public function create_SousCategorie()
    {
        $this->validate();

        $sous_categorie_exist = SousCategorie::where('libelle', $this->libelle)->where('categorie_id',$this->selectCategorie)->first();

        if($sous_categorie_exist){
            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'warning',  
                'message' => "La Sous Categorie que vous essayez d'Enregistrer existe deja", 
                'text' => "Impossible !!"
            ]);
            return redirect(request()->header('Referer'));
        }
        $sous_categorie = new SousCategorie;
        $sous_categorie->libelle = $this->libelle ;
        $sous_categorie->categorie_id = $this->selectCategorie ;
        if ($this->ASphoto) {
                $img = $this->ASphoto;
                $photo_souscat = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'Backend/images/SousCategorie/'.$photo_souscat;
                InterventionImage::make($source)->fit(1000,440)->save($target);//taille de la photo a chercher
                $sous_categorie->photo   =  $photo_souscat;
        }
        $sous_categorie->slug = "SELONTOI-SOUSCAT".Str::slug("$this->libelle".Hash::make($this->libelle),"-");
        $sous_categorie->save();

        if($sous_categorie->save()){
            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',  
                'message' => 'Sous Categorie Enregistrer avec success', 
                'text' => "Merci  !!"
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


    public function edit_sousCategorie($id_souscategorie)
    {
        $sous_categorie = SousCategorie::find($id_souscategorie);

        if($sous_categorie) {
            $this->id_souscategorie = $sous_categorie->id ;
            $this->libelle = $sous_categorie->libelle;
            $this->selectCategorie = $sous_categorie->categorie_id ;
        }
    }

    public function modifySousCategorie()
    {
        $sous_categorie = SousCategorie::find($this->id_souscategorie);

        if($sous_categorie) {
            $sous_categorie->libelle = $this->libelle ;
            if($this->selectCategorie && $this->selectCategorie != $sous_categorie->categorie_id){
                $sous_categorie->categorie_id = $this->selectCategorie;
            }
            if ($this->ASphoto) {
                $img = $this->ASphoto;
                $photo_souscat = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'Backend/images/SousCategorie/'.$photo_souscat;
                InterventionImage::make($source)->fit(1000,440)->save($target);//taille de la photo a chercher
                $sous_categorie->photo   =  $photo_souscat;
        }else{
            $sous_categorie->photo = $sous_categorie->photo;
        }
            $sous_categorie->update();

            if($sous_categorie->update()){

                    $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                        'type' => 'success',  
                        'message' => 'Sous Categorie Modifier avec success', 
                        'text' => "Merci !!"
                    ]);
            
                    $this->reset();
                    $this->dispatchBrowserEvent('closeModaleModifySousCategorie');
            }else{
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'error',  
                    'message' => "Une Erreur c'est produite", 
                    'text' => "Ouupppss !!"
                ]);
            }

        }
    }

    public function deleteSousCategorie($id_souscategorie)
    {
        $sous_categorie = SousCategorie::find($id_souscategorie);

        if($sous_categorie) {
            $this->dispatchBrowserEvent('swal:modalDeleteSousCategorie', [
                'type' => 'warning',  
                'text' => "Si vous suprimer cette Sous Categorie (". $sous_categorie->libelle . "), vous supprimerez tous les produits associees !",
                'title' => "Attention !!",
                'id' => $sous_categorie->id
            ]);
        }
    }

    public function SupprimerSousCategorie($id_souscategorie)
    {
        $sous_categorie = SousCategorie::find($id_souscategorie);

        if($sous_categorie) {
            $doc_path = "Backend/images/SousCategorie/$sous_categorie->photo";
            if (File::exists($doc_path)) {
                File::delete($doc_path);
            }

            $sous_categorie->delete();

            $this->dispatchBrowserEvent('swal:modalSupprimer', [
                'type' => 'success',  
                'text' => "Sous Categorie Supprimer avec Succes",
                'title' => "Success!!",
            ]);
        }
    }

    public function checkProductAtSousVategorie($id_souscategorie)
    {
        $sous_categorie = SousCategorie::find($id_souscategorie);

        if($sous_categorie) {
            $this->id_souscategorie = $sous_categorie->id;
            $this->libelle = $sous_categorie->libelle;
            $this->ASphotomodif = $sous_categorie->photo;

            $this->productAtSouscat = Produit::where('sousCategorie_id',$sous_categorie->id)->get();
        }
    }

    public function modifyImg()
    {
        $sous_categorie = SousCategorie::find($this->id_souscategorie);

        if($sous_categorie) {
            if ($this->ASphoto) {
                    $img = $this->ASphoto;
                    $photo_souscat = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'Backend/images/SousCategorie/'.$photo_souscat;
                    InterventionImage::make($source)->fit(1000,440)->save($target);//taille de la photo a chercher
                    $sous_categorie->photo   =  $photo_souscat;
            }else{
                $sous_categorie->photo = $sous_categorie->photo;
            }
            $sous_categorie->update();
            if($sous_categorie->update()){
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',  
                    'message' => 'Image Modifier avec success', 
                    'text' => "Merci !!"
                ]);
        
                $this->reset();
                $this->dispatchBrowserEvent('closeModaleModifyImageSousCategorie');
            }else{
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'error',  
                    'message' => "Une Erreur c'est produite", 
                    'text' => "Ouupppss !!"
                ]);
            }
        }
    }

    public function render()
    {
        return view('livewire.live-sous-categorie',[
            'the_category' => Categorie::all(),
            'subCategorie' => SousCategorie::all(),
            'categories' => Categorie::OrderBy('libelle','DESC')->get()
        ]);
    }
}
