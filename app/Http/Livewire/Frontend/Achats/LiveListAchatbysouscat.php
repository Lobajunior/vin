<?php

namespace App\Http\Livewire\Frontend\Achats;

use Livewire\Component;
use App\Models\SousCategorie;

class LiveListAchatbysouscat extends Component
{
    public function render()
    {
        return view('livewire.frontend.achats.live-list-achatbysouscat',[
            'sousCatCible' => SousCategorie::all()
        ]);
    }
}
