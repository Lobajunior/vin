<?php

namespace App\Http\Livewire\Frontend\Navbar;

use Livewire\Component;
use App\Models\Categorie;

class ListCategorie extends Component
{
    public function render()
    {
        return view('livewire.frontend.navbar.list-categorie',[
            'Listcategorie' => Categorie::OrderBy('created_at','ASC')->take(8)->get()
        ]);
    }
}
