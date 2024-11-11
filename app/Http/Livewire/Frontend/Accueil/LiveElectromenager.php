<?php

namespace App\Http\Livewire\Frontend\Accueil;

use Livewire\Component;
use App\Models\Categorie;

class LiveElectromenager extends Component
{
    public function render()
    {
        return view('livewire.frontend.accueil.live-electromenager',[
            'ElectromenagerCategorie' => Categorie::where('libelle','LIKE','%'.'ÉLECTROMÉNAGER'.'%')->get(),
        ]);
    }
}
