<?php

namespace App\Http\Livewire\Frontend\Accueil;

use Livewire\Component;
use App\Models\Categorie;

class LiveCategorie extends Component
{
    public function render()
    {
        return view('livewire.frontend.accueil.live-categorie',[
            'listCategorie' => Categorie::take(7)->get()
        ]);
    }
}
