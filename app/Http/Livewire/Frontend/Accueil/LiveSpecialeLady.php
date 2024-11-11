<?php

namespace App\Http\Livewire\Frontend\Accueil;

use App\Models\Produit;
use Livewire\Component;

class LiveSpecialeLady extends Component
{
    public function render()
    {
        return view('livewire.frontend.accueil.live-speciale-lady',[
            'produitSpecialeLadies' => Produit::where('type','Femmes')->where('is_djassa',0)->where('etat',1)->get()
        ]);
    }
}
