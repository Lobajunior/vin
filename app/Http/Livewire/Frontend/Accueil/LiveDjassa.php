<?php

namespace App\Http\Livewire\Frontend\Accueil;

use App\Models\Produit;
use Livewire\Component;

class LiveDjassa extends Component
{
    public function render()
    {
        return view('livewire.frontend.accueil.live-djassa',[
            'produitDjassa' => Produit::where('etat',1)->get()
        ]);
    }
}
