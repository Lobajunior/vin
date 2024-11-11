<?php

namespace App\Http\Livewire\Frontend\Produits;

use App\Models\Note;
use App\Models\Produit;
use Livewire\Component;

class LiveListproduct extends Component
{
    public $productItem ;
    public $sum_rating_produit = array() ;



    function mount() : void {
        $this->productItem = Produit::OrderBy('created_at','DESC')->where('is_djassa',0)->where('etat',1)->get();

        $this->rating( $this->productItem);
    }



    public function loadMore(){
        $this->paginateNumber += 10 ;

        $this->productItem = Produit::OrderBy('created_at','DESC')->where('is_djassa',0)->where('etat',1)->get();

        $this->rating( $this->productItem);
    }


    private function rating($product) : void {
        $table = [];

        //parcourt pour pouvoir utiliser l'id de chaque produit de la collection pour determiner ses notes 
        foreach($product as $parameters){

            /**Sum des Notes du produit en cour de parcourt */
           $rating_sum_by_list_produit = Note::query()
                    ->select('notes.nb_etoiles','produits.id')
                    ->join('produits','notes.produit_id','=','produits.id')
                    ->where('produits.id',$parameters->id)
                    ->sum('notes.nb_etoiles');

            /**Total des Tuples du produit en cour de parcourt */
            $rating_count_by_list_produit = Note::query()
                    ->select('notes.nb_etoiles','produits.id')
                    ->join('produits','notes.produit_id','=','produits.id')
                    ->where('produits.id',$parameters->id)
                    ->count();

            /**Condition pour eviter l'erreur ??  DIVISY BY ZERO 0  ?? */
            if($rating_count_by_list_produit == 0){
                $rating_count_by_list_produit = 1 ;
            }

            //Calcul de la moyenne
            $rating_moyen_by_list_produit = floor($rating_sum_by_list_produit / $rating_count_by_list_produit) ;

            array_push($table,$rating_moyen_by_list_produit);
        }

        $this->sum_rating_produit = $table ;
    }
    
    public function render()
    {
        return view('livewire.frontend.produits.live-listproduct');
    }
}
