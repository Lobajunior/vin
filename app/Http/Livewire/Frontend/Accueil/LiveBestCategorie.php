<?php

namespace App\Http\Livewire\Frontend\Accueil;

use Livewire\Component;
use App\Models\Categorie;

class LiveBestCategorie extends Component
{
    public function render()
    {
        return view('livewire.frontend.accueil.live-best-categorie',[
            'best_categorie' => Categorie::where('is_best',1)->get()
        ]);
    }
}
