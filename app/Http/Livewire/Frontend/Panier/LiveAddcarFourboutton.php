<?php

namespace App\Http\Livewire\Frontend\Panier;

use App\Models\Produit;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class LiveAddcarFourboutton extends Component
{
    public $idproduit ;

    function mount($id) : void {
        $this->idproduit = $id ;
    }

    function ajout_cart() : void {
        $qte = 1;
        $p = Produit::where([
            ['id',$this->idproduit]
        ])->first();
        $this->ADDtoCART($p->id, $qte); 
    }

    
    public function ADDtoCART($p_id, $qte)
    {
        $p = Produit::find($p_id);

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
                $prix = str_replace(' ','', $p->prix);
                $card =  Cart::add(['id' => $p->id, 'name' => $p->libelle, 'price' => $prix, 'qty' => $qte, 'options' => ['image' => $p->photo, 'slug' => $p->slug]]); 
                 $this->dispatchBrowserEvent('NotifySuccess', [
            'message' => 'produit ajouter au panier', 
        ]);
               
            }
        }else{
            $prix = str_replace(' ','', $p->prix);
             $card = Cart::add(['id' => $p->id, 'name' => $p->libelle, 'price' => $prix, 'qty' => $qte, 'options' => ['image' => $p->photo, 'slug' => $p->slug]]); 
              $this->dispatchBrowserEvent('NotifySuccess', [
            'message' => 'produit ajouter au panier avec succès', 
        ]);
        }
    }


    public function render()
    {
        return view('livewire.frontend.panier.live-addcar-fourboutton');
    }
}
