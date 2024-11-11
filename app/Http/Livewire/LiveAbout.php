<?php

namespace App\Http\Livewire;

use App\Models\About;
use Livewire\Component;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use Livewire\WithFileUploads;
use Image as InterventionImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class LiveAbout extends Component
{
    use WithFileUploads;

    public $titre , $pte_description ;
    public $AsImage =  NULL ;
    public $AsBanner =  NULL ;


    
    protected $rules=[
        'titre' =>  ['required','min:3']
    ];

    protected $messages = [
        'titre.required' => "Un Titre est requis",
        'titre.titre' => "Minimum 3 caractere",
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function create_About()
    {
        $this->validate();

        $a_propos = new About ;
        $a_propos->titre = $this->titre ;
        If($this->pte_description){
            $a_propos->pte_description = $this->pte_description ;
        }
        if ($this->AsBanner) {
            $img = $this->AsBanner;
                $banniere_about = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'Backend/images/About/'.$banniere_about;
                InterventionImage::make($source)->fit(1660,246)->save($target);
                $a_propos->banner   =  $banniere_about;
        }

        if ($this->AsImage) {
            $img = $this->AsImage;
                $img_about = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'Backend/images/About/'.$img_about;
                InterventionImage::make($source)->fit(770,770)->save($target);
                $a_propos->image   =  $img_about;
        }

        $a_propos->slug = "SELONTOI-ABOUT".Str::slug("$this->titre".Hash::make($this->titre),"-"); 

        $a_propos->save();

        if( $a_propos->save()){
            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',  
                'message' => 'Une Section A propos vient d\'etre creer ', 
                'text' => "Merci Bien !!"
            ]);
            
            $this->reset();
        }
    }



    public function Edit_About()
    {
        $a_propos = About::first();

        $this->titre = $a_propos->titre ;
        $this->pte_description = $a_propos->pte_description ;
    }

    public function changeAbout()
    {
        $a_propos = About::first();

        $a_propos->titre =   $this->titre ;
        $a_propos->pte_description = $this->pte_description ;

        if ($this->AsBanner) {

            $doc_path = "Backend/images/About/$a_propos->banner";
            if (File::exists($doc_path)) {
                File::delete($doc_path);
            }

            $img = $this->AsBanner;
                $banniere_about = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'Backend/images/About/'.$banniere_about;
                InterventionImage::make($source)->fit(1660,246)->save($target);
                $a_propos->banner   =  $banniere_about;
        }

        if ($this->AsImage) {

            $doc_path = "Backend/images/About/$a_propos->image";
            if (File::exists($doc_path)) {
                File::delete($doc_path);
            }

            $img = $this->AsImage;
                $img_about = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                $source = $img;
                $target = 'Backend/images/About/'.$img_about;
                InterventionImage::make($source)->fit(770,770)->save($target);
                $a_propos->image   =  $img_about;
        }

        $a_propos->update();

        if($a_propos->update()){
            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',  
                'message' => 'La Section A propos vient d\'etre Modifier ', 
                'text' => "Merci !!"
            ]);
            
            $this->reset();
            $this->dispatchBrowserEvent('closeModalEditAbout');
        }
    }
    public function render()
    {
        return view('livewire.live-about',[
            'about' => About::first()
        ]);
    }
}
