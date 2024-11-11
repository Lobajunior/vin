<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\CategorieBlog;
use Illuminate\Support\Facades\Hash;

class LiveCategorieBlog extends Component
{
    public $libelle,$id_cat ;

    protected $listeners = ['SupprimerCategorieBlog'];

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


    public function create_categorieBlog(){
        $this->validate();

        $blog = new CategorieBlog;
        $blog->libelle = $this->libelle;

        $blog->slug =  "SELONTOI-BlogCategorie".Str::slug("$this->libelle".Hash::make($this->libelle),"-");  

        $blog->save();
            if($blog->save()){

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


    function editCat($categorie_id) : void {
        $catBlog = CategorieBlog::find($categorie_id);
        if($catBlog){
            $this->id_cat = $catBlog->id ;
            $this->libelle = $catBlog->libelle ;
        }
    }

    function updateCat() : void {
        $catBlog = CategorieBlog::find($this->id_cat);
        if($catBlog){
            $catBlog->libelle = $this->libelle ;
            $catBlog->update();

            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',  
                'message' => 'Categorie modifier avec success', 
                'text' => "Merci Bien !!"
            ]);
            
            $this->reset();
            $this->dispatchBrowserEvent('closeModalEditCatBlog');
        }
    }

    function deleteCat($categorie_id) : void {
        $catBlog = CategorieBlog::find($categorie_id);
        if($catBlog){
            $this->id_cat = $catBlog->id ;
            $this->dispatchBrowserEvent('swal:modalDeleteCategorieBlog', [
                'type' => 'warning',  
                'text' => "Etes vous sur de vouloir suprimer la Categorie ( ". $catBlog->libelle . " ) ?",
                'title' => "Attention !",
                'id' => $catBlog->id
            ]);
        }
    }

    function SupprimerCategorieBlog($categorie_id) : void {
        $catBlog = CategorieBlog::find($categorie_id);
        if($catBlog){
            $catBlog->delete();
            $this->dispatchBrowserEvent('swal:modalSupprimer', [
                'type' => 'success',  
                'text' => "Categorie Supprimer avec Succes",
                'title' => "Success",
            ]);

            $this->reset();
        }
    }
    
    public function render()
    {
        return view('livewire.live-categorie-blog',[
            'blogCat' => CategorieBlog::OrderBy('libelle','ASC')->get()
        ]);
    }
}
