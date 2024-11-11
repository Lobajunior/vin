<?php

namespace App\Http\Livewire\Frontend\Panier;

use App\Models\Produit;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class LivePanier extends Component
{

    /**
     * AUGMENTER LA QUNATITY d'un produit
     */
    public function UCART($p_id)
    {
        $p = Produit::find($p_id);
        $cart = Cart::Content();
        $verif = $cart->search(function ($cartItem, $rowId) use ($p) {
           return  $cartItem->id === $p->id;
        });
        $card = Cart::get($verif);
        $qte = $card->qty + 1;
        Cart::update($verif, ['qty' => $qte]);
        $this->dispatchBrowserEvent('NotifySuccess', [
            'message' => 'une Quantité a été ajouter', 
        ]);
    }


    /**
     * DIMINUER LA QUANTITY D"UN PRODUIT
     */
    public function DQCART($p_id)
    {
        $p = Produit::find($p_id);
        $cart = Cart::Content();
        $verif = $cart->search(function ($cartItem, $rowId) use ($p) {
           return  $cartItem->id === $p->id;
        });
        $card = Cart::get($verif);
        if($card->qty >= 2)
        {
            $qte = $card->qty - 1;
            Cart::update($verif, ['qty' => $qte]);
            $this->dispatchBrowserEvent('NotifyLikedExist', [
                'type' => 'warning',  
                'message' => 'Une quantité a été rétirer', 
            ]);
            return redirect()->back();
        }
        else{
            $this->dispatchBrowserEvent('NotifyLikedExist', [
                'type' => 'warning',  
                'message' =>  'Désolé la quantité peut être inferieure ou égale à zéro (0), 
                veuillez supprimer le produit si vous voulez le rétirer définitivement !', 
            ]);
            return redirect()->back();
        }
    }


    /**
     * 
     * SUPPRIMER LE PRODUIT DU PANIER
     * 
     */
    public function DeleteProd($p_id)
    {
        $p = Produit::find($p_id);
        $cart = Cart::Content();
        $verif = $cart->search(function ($cartItem, $rowId) use ($p) {
           return  $cartItem->id === $p->id;
        });
         Cart::remove($verif);

         if (Cart::content()->count()>0) {
            $this->dispatchBrowserEvent('NotifyLikedExist', [
                'message' =>  'Produit supprimer avec success  !', 
            ]);
            return redirect()->back();
         }else{
             return redirect()->to('/produits');
         }
    }
    
    public function render()
    {
        return view('livewire.frontend.panier.live-panier');
    }
}
