<?php

namespace App\Http\Livewire;

use App\Models\Slide;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Image;
use Image as InterventionImage;
use Illuminate\Support\Facades\File;


class LiveSlide extends Component
{
    use WithFileUploads;

    public $libelle, $description , $mini_titre, $search;
    public $AsImage = null ;

    protected $listeners = ['SupprimerSlide','finish_activate_slide'];

    protected $rules=[
        'AsImage' =>  ['required'],
    ];

    protected $messages = [
        'AsImage.required' => "Une Image de categorie est requis",
        'AsImage.AsImage' => "Minimum 3 caractere",
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    function createSlide(Request $request) : void {
        $this->validate();

        $slide = new Slide ;
        $slide->libelle = $this->libelle ;
        $slide->mini_titre = $this->mini_titre ;
        $slide->description = $this->description ;
        $slide->slug = "SELONTOI-Slide".Str::slug(Hash::make($request->fingerprint())) ;
        if ($this->AsImage) {
            $img = $this->AsImage;
                $image_slide = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'Backend/images/Slide/'.$image_slide;
                InterventionImage::make($source)->fit(1660,425)->save($target);//taille de la banner a chercher
                $slide->image   =  $image_slide;
        }

        $slide->save();

        if($slide->save()){

            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',  
                'message' => 'le Slide Enregistrer avec success', 
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



    function deleteSlide($slide_id) : void {
        $slide = Slide::find($slide_id);
        if($slide){
            $this->dispatchBrowserEvent('swal:modalDeleteSlide', [
                'type' => 'warning',  
                'text' => "Etes vous sur de vouloir suprimer le Blog ( ". Str::words($slide->libelle,2,'...') . " ) ?",
                'title' => "Attention !",
                'id' => $slide->id
            ]);
        }
    }

    function SupprimerSlide($slide_id) : void {
        $slide = Slide::find($slide_id);
        if($slide){

            $doc_path = "Backend/images/Slide/$slide->image";
            if (File::exists($doc_path)) {
                File::delete($doc_path);
            }

            $slide->delete();
            $this->dispatchBrowserEvent('swal:modalSupprimer', [
                'type' => 'success',  
                'text' => "Slide Supprimer avec Succes",
                'title' => "Success",
            ]);

            $this->reset();
        }
    }

    public function render()
    {
        return view('livewire.live-slide',[
            'slidefirst'=> Slide::first(),
            'Listslide'=> Slide::where('id','!=',Slide::first()->id)->get(),
        ]);
    }

    function activate_slide($id_slide) {
        $slide = Slide::find($id_slide);
        if($slide){

            if($slide->etat == 0){
                $this->dispatchBrowserEvent('swal:modalActivateSlide', [
                    'type' => 'info',  
                    'text' => "Vous allez activer le slide : ( ". Str::words($slide->libelle,2,'...') . " ) ?",
                    'title' => "Alerte !",
                    'id' => $slide->id
                ]);
            }else{
                $this->dispatchBrowserEvent('swal:modalActivateSlide', [
                    'type' => 'info',  
                    'text' => "Vous allez desactiver le slide : ( ". Str::words($slide->libelle,2,'...') . " ) ?",
                    'title' => "Alerte !",
                    'id' => $slide->id
                ]);
            }
        }
    }

    function finish_activate_slide($id_slide) {
        $slide = Slide::find($id_slide);
        if($slide){
            if($slide->etat == 0){
                $slide->etat = 1 ;
                $slide->update();

                $this->dispatchBrowserEvent('swal:modalSupprimer', [
                    'type' => 'success',  
                    'text' => "Slide Activer avec Succes",
                    'title' => "Success",
                ]);
            }elseif($slide->etat == 1){
                $slide->etat = 0 ;
                $slide->update();

                $this->dispatchBrowserEvent('swal:modalSupprimer', [
                    'type' => 'warning',  
                    'text' => "Le slide vient d'etre desactiver",
                    'title' => "Alerte",
                ]);
            }else{
                $this->dispatchBrowserEvent('swal:modalSupprimer', [
                    'type' => 'error',  
                    'text' => "une erreur c'est produite veuillez contactez votre maintenancier !!",
                    'title' => "Attention",
                ]);
            }
        }
    }
}
