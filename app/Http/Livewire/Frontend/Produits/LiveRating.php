<?php

namespace App\Http\Livewire\Frontend\Produits;

use App\Models\Note;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LiveRating extends Component
{
    public $etoiles = 1 ;
    public $details, $id_produits ;
    public  $cinq_etoile_produit , $cinq_etoile_total , $cinq_etoile_pourcent; //Variables permettant de definir le pourcentage de 5 etoiles
    public  $quatre_etoile_produit , $quatre_etoile_total , $quatre_etoile_pourcent; //Variables permettant de definir le pourcentage de 4 etoiles
    public  $trois_etoile_produit , $trois_etoile_total , $trois_etoile_pourcent; //Variables permettant de definir le pourcentage de 3 etoiles
    public  $deux_etoile_produit , $deux_etoile_total , $deux_etoile_pourcent; //Variables permettant de definir le pourcentage de 2 etoiles
    public  $one_etoile_produit , $one_etoile_total , $one_etoile_pourcent; //Variables permettant de definir le pourcentage d'une etoiles

    function mount($id) : void {
        $this->id_produits = $id ;
        $this->calcul_pourcentage();
    }

    protected $rules=[
        'etoiles' =>  ['required','min:1','int']
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    function createRating(Request $request)  {
        $this->validate();

        if(!Auth::user()){
            return redirect()->to('/login');
        }

        $rating_exist = Note::where('user_id',Auth::user()->id)->where('produit_id',$this->id_produits)->first();
        if($rating_exist){
            $this->dispatchBrowserEvent('NotifyLikedExist', [
                'type' => 'warning',  
                'message' => 'Vous avez deja donner une note de ('.$rating_exist->nb_etoiles.' etoiles) a ce produit', 
            ]);

            return redirect()->back();
        }

        $rating = new Note;
        $rating->nb_etoiles = $this->etoiles;
        $rating->details = $this->details;
        $rating->produit_id = intval($this->id_produits);
        $rating->user_id = Auth::user()->id;
        $rating->slug = "SELONTOI-RATING".Str::slug(Hash::make($request->fingerprint())); 

        $rating->save();
        $this->dispatchBrowserEvent('NotifySuccess', [
            'message' => 'Vous venez d\'ajouter une note de '. $rating->nb_etoiles.' etoiles a ce produit ', 
        ]);

        $prod_id = $this->id_produits;
        $this->reset();
        $this->mount($prod_id);

    }


    public function render()
    {
        return view('livewire.frontend.produits.live-rating');
    }


    function calcul_pourcentage() : void {
        
        //Cinq Etoiles
        $this->cinq_etoile_produit = Note::query()
                    ->select('notes.nb_etoiles','notes.details','notes.produit_id','notes.user_id','produits.id')
                    ->join('produits','notes.produit_id','=','produits.id')
                    ->where('produits.id',$this->id_produits)
                    ->where('notes.nb_etoiles',5)
                    ->count();

        $this->cinq_etoile_total = Note::query()
                    ->select('notes.nb_etoiles','notes.details','notes.produit_id','notes.user_id','produits.id')
                    ->join('produits','notes.produit_id','=','produits.id')
                    ->where('produits.id',$this->id_produits)
                    ->count();

        //Pour eviter qu'une erreur de division par 0 s'affiche
            if($this->cinq_etoile_total == 0){
                $this->cinq_etoile_total = 1 ;
            }

        $this->cinq_etoile_pourcent = $this->cinq_etoile_produit * 100 / $this->cinq_etoile_total ;


        /**************Quatre Etoiles *********************/
        /************** */
        /************ */
        $this->quatre_etoile_produit = Note::query()
                    ->select('notes.nb_etoiles','notes.details','notes.produit_id','notes.user_id','produits.id')
                    ->join('produits','notes.produit_id','=','produits.id')
                    ->where('produits.id',$this->id_produits)
                    ->where('notes.nb_etoiles',4)
                    ->count();

            

        $this->quatre_etoile_total = Note::query()
                    ->select('notes.nb_etoiles','notes.details','notes.produit_id','notes.user_id','produits.id')
                    ->join('produits','notes.produit_id','=','produits.id')
                    ->where('produits.id',$this->id_produits)
                    ->count();

        if($this->quatre_etoile_total == 0){
            $this->quatre_etoile_total = 1 ;
        }

        $this->quatre_etoile_pourcent = $this->quatre_etoile_produit * 100 / $this->quatre_etoile_total ;


        /************* */
        /************** TROIS ETOILES **********/
        /************ */
        $this->trois_etoile_produit = Note::query()
                    ->select('notes.nb_etoiles','notes.details','notes.produit_id','notes.user_id','produits.id')
                    ->join('produits','notes.produit_id','=','produits.id')
                    ->where('produits.id',$this->id_produits)
                    ->where('notes.nb_etoiles',3)
                    ->count();

            

        $this->trois_etoile_total = Note::query()
                    ->select('notes.nb_etoiles','notes.details','notes.produit_id','notes.user_id','produits.id')
                    ->join('produits','notes.produit_id','=','produits.id')
                    ->where('produits.id',$this->id_produits)
                    ->count();

        if($this->trois_etoile_total == 0){
            $this->trois_etoile_total = 1 ;
        }

        $this->trois_etoile_pourcent = $this->trois_etoile_produit * 100 / $this->trois_etoile_total ;


        /************* */
        /************** DEUX ETOILES **********/
        /************ */
        $this->deux_etoile_produit = Note::query()
                    ->select('notes.nb_etoiles','notes.details','notes.produit_id','notes.user_id','produits.id')
                    ->join('produits','notes.produit_id','=','produits.id')
                    ->where('produits.id',$this->id_produits)
                    ->where('notes.nb_etoiles',2)
                    ->count();

            

        $this->deux_etoile_total = Note::query()
                    ->select('notes.nb_etoiles','notes.details','notes.produit_id','notes.user_id','produits.id')
                    ->join('produits','notes.produit_id','=','produits.id')
                    ->where('produits.id',$this->id_produits)
                    ->count();

        if($this->deux_etoile_total == 0){
            $this->deux_etoile_total = 1 ;
        }

        $this->deux_etoile_pourcent = $this->deux_etoile_produit * 100 / $this->deux_etoile_total ;


        /************* */
        /************** UNE ETOILES **********/
        /************ */
        $this->one_etoile_produit = Note::query()
                    ->select('notes.nb_etoiles','notes.details','notes.produit_id','notes.user_id','produits.id')
                    ->join('produits','notes.produit_id','=','produits.id')
                    ->where('produits.id',$this->id_produits)
                    ->where('notes.nb_etoiles',1)
                    ->count();

            

        $this->one_etoile_total = Note::query()
                    ->select('notes.nb_etoiles','notes.details','notes.produit_id','notes.user_id','produits.id')
                    ->join('produits','notes.produit_id','=','produits.id')
                    ->where('produits.id',$this->id_produits)
                    ->count();

        if($this->one_etoile_total == 0){
            $this->one_etoile_total = 1 ;
        }

        $this->one_etoile_pourcent = $this->one_etoile_produit * 100 / $this->one_etoile_total ;

    }
}
