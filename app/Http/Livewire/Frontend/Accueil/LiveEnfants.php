<?php

namespace App\Http\Livewire\Frontend\Accueil;

use App\Models\Produit;
use Livewire\Component;

class LiveEnfants extends Component
{
    public function render()
    {
        return view('livewire.frontend.accueil.live-enfants',[
            'produitEnfants' => Produit::where('type','Enfants')->where('etat',1)->get(),
        ]);
    }
}
