<?php

namespace App\Http\Livewire\Frontend\Produits;

use Livewire\Component;
use App\Models\Categorie;

class FiltreCategorie extends Component
{
    public function render()
    {
        return view('livewire.frontend.produits.filtre-categorie',[
            'filtreByCategorie' => Categorie::all()
        ]);
    }
}
