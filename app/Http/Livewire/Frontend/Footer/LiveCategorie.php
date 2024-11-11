<?php

namespace App\Http\Livewire\Frontend\Footer;

use Livewire\Component;
use App\Models\Categorie;

class LiveCategorie extends Component
{
    public function render()
    {
        return view('livewire.frontend.footer.live-categorie',[
            'listCategorieFoo' => Categorie::take(6)->get()
        ]);
    }
}
