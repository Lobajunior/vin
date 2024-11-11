<?php

namespace App\Http\Livewire\Frontend\Accueil;

use App\Models\Produit;
use Livewire\Component;

class LiveSpecialeHomme extends Component
{
    public function render()
    {
        return view('livewire.frontend.accueil.live-speciale-homme',[
            'produitSpecialeBoys' => Produit::where('etat',1)->where('type','Hommes')->get()
        ]);
    }
}
