<?php

namespace App\Http\Livewire\Frontend\Accueil;

use App\Models\Note;
use App\Models\Produit;
use Livewire\Component;

class LiveBestReview extends Component
{
    public $produitBestReview ;
    public $sum_rating_produit = array();

    function mount() : void {
        $this->produitBestReview = Produit::query()
                    ->select('produits.id', 'produits.sousCategorie_id', 'produits.libelle',
                    'produits.photo', 'produits.images_secondaires', 'produits.taille',
                    'produits.couleur', 'produits.prix', 'produits.type','produits.slug','produits.is_djassa',
                    'produits.etat', 'produits.qte_stock', 'produits.description', 'produits.pointure',
                    'notes.id as IdNote','notes.nb_etoiles','notes.produit_id','notes.user_id',
                    'notes.slug as SlugNote')
                    ->join('notes','notes.produit_id','=','produits.id')
                    ->where('notes.nb_etoiles',5)
                    ->where('produits.is_djassa',0)
                    ->get();

        $table = [];

        //parcourt pour pouvoir utiliser l'id de chaque produit de la collection pour determiner ses notes 
        foreach($this->produitBestReview as $parameters){

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
        return view('livewire.frontend.accueil.live-best-review');
    }
}
