<?php

namespace App\Http\Livewire\Frontend\Accueil;

use App\Models\Produit;
use Livewire\Component;

class LiveAccessoire extends Component
{
    public function render()
    {
        return view('livewire.frontend.accueil.live-accessoire',[
            'produitAccessoire' => Produit::where('type','Accessoire')->where('etat',1)->get()
        ]);
    }
}
