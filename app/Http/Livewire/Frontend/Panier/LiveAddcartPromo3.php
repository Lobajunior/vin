<?php

namespace App\Http\Livewire\Frontend\Panier;

use App\Models\Produit;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class LiveAddcartPromo3 extends Component
{

    public $idproduit ;

    function mount($id) : void {
        $this->idproduit = $id ;
    }

    function ajout_cart() : void {
        $qte = 1;
        $p = Produit::query()
        ->select('produits.id', 'produits.sousCategorie_id', 'produits.libelle',
         'produits.photo', 'produits.images_secondaires', 'produits.taille',
         'produits.couleur', 'produits.prix', 'produits.type', 'produits.slug',
         'produits.etat', 'produits.qte_stock', 'produits.description', 'produits.pointure',
          'promos.id as Idpromotion', 'promos.prix as PricePromoter', 'promos.etat as EtatPromoter',
           'promos.date_debut', 'promos.date_fin', 'promos.produit_id', 'promos.nb_promo', 'promos.nb_jours')
        ->join('promos','promos.produit_id','=','produits.id')
        ->where('promos.etat',1)
        ->where('produits.id',$this->idproduit)
        ->where('promos.date_debut', '<=', date('Y-m-d'))
        ->where('promos.date_fin', '>=', date('Y-m-d'))
        ->first();
        $this->ADDtoCART($p->id, $qte);

       
    }

    public function ADDtoCART($p_id, $qte)
    {

        $p = Produit::query()
            ->select('produits.id', 'produits.sousCategorie_id', 'produits.libelle',
            'produits.photo', 'produits.images_secondaires', 'produits.taille',
            'produits.couleur', 'produits.prix', 'produits.type', 'produits.slug',
            'produits.etat', 'produits.qte_stock', 'produits.description', 'produits.pointure',
            'promos.id as Idpromotion', 'promos.prix as PricePromoter', 'promos.etat as EtatPromoter',
            'promos.date_debut', 'promos.date_fin', 'promos.produit_id', 'promos.nb_promo', 'promos.nb_jours')
            ->join('promos','promos.produit_id','=','produits.id')
            ->where('promos.etat',1)
            ->where('produits.id',$p_id)
            ->where('promos.date_debut', '<=', date('Y-m-d'))
            ->where('promos.date_fin', '>=', date('Y-m-d'))
            ->first();


        if (Cart::Content()->count()>0) {
            $cart = Cart::Content();
            $verif = $cart->search(function ($cartItem, $rowId) use ($p) {
               return  $cartItem->id === $p->id;
            });
            
            if ($verif) {
                $cartget = Cart::get($verif)->qty ;    
                Cart::update($verif, ['qty' => $cartget + $qte]);
                $this->dispatchBrowserEvent('NotifySuccess', [
                    'message' => 'une quantiter de plus viens d\'etres ajouter pour ce produit', 
                ]);
                return redirect()->back();
            }else{
                $prix = str_replace(' ','', $p->PricePromoter);
                $card =  Cart::add(['id' => $p->id, 'name' => $p->libelle, 'price' => $prix, 'qty' => $qte, 'options' => ['image' => $p->photo, 'slug' => $p->slug]]); 
                 $this->dispatchBrowserEvent('NotifySuccess', [
            'message' => 'produit ajouter au panier', 
        ]);
               
            }
        }else{
            $prix = str_replace(' ','', $p->PricePromoter   );
             $card = Cart::add(['id' => $p->id, 'name' => $p->libelle, 'price' => $prix, 'qty' => $qte, 'options' => ['image' => $p->photo, 'slug' => $p->slug]]); 
              $this->dispatchBrowserEvent('NotifySuccess', [
            'message' => 'produit ajouter au panier avec succès', 
        ]);
        }
       
    }

    public function render()
    {
        return view('livewire.frontend.panier.live-addcart-promo3');
    }
}
