<?php

namespace App\Http\Livewire\Frontend\Accueil;

use App\Models\Produit;
use Livewire\Component;

class Dealtoday extends Component
{
    public function render()
    {
        return view('livewire.frontend.accueil.dealtoday',[
            'dealoftodays' => Produit::query()
                            ->select('produits.id', 'produits.sousCategorie_id', 'produits.libelle',
                             'produits.photo', 'produits.images_secondaires', 'produits.taille',
                             'produits.couleur', 'produits.prix', 'produits.type','produits.slug',
                             'produits.etat', 'produits.qte_stock', 'produits.description', 'produits.pointure',
                              'promos.id as Idpromotion', 'promos.prix as PricePromoter', 'promos.etat as EtatPromoter',
                               'promos.date_debut', 'promos.date_fin', 'promos.produit_id', 'promos.nb_promo', 'promos.nb_jours')
                            ->join('promos','promos.produit_id','=','produits.id')
                            ->where('promos.date_fin', '=', date('Y-m-d'))
                            ->where('promos.etat',1)
                            ->where('produits.etat',1)
                            ->get()
        ]);
    }
}
