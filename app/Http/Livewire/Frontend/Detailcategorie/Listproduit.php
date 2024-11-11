<?php

namespace App\Http\Livewire\Frontend\Detailcategorie;

use App\Models\Produit;
use Livewire\Component;

class Listproduit extends Component
{

    protected $cat_id ;

    function mount($id) : void {
        $this->cat_id = $id ;
    }

    public function render()
    {
        return view('livewire.frontend.detailcategorie.listproduit',[
            'produitByCategorie' => Produit::query()
                            ->select('produits.id', 'produits.sousCategorie_id', 'produits.libelle',
                            'produits.photo', 'produits.images_secondaires', 'produits.taille',
                            'produits.couleur', 'produits.prix', 'produits.type','produits.slug',
                            'produits.etat', 'produits.qte_stock', 'produits.description', 'produits.pointure','sous_categories.id as IdSouscat','sous_categories.libelle as LibelleSouscat','sous_categories.categorie_id','sous_categories.slug as SlugSouscat'
                            ,'categories.id as Idcat','categories.libelle as LibCategorie','categories.slug as SlugCategorie','categories.logo')
                            ->join('sous_categories','produits.sousCategorie_id','=','sous_categories.id')
                            ->join('categories','sous_categories.categorie_id','=','categories.id')
                            ->where('categories.id',$this->cat_id)
                            ->where('produits.is_djassa',0)
                            ->where('produits.etat',1)
                            ->get()
        ]);
    }
}
