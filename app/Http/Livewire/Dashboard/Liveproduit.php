<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Produit;
use Livewire\Component;

class Liveproduit extends Component
{
    public function render()
    {
        return view('livewire.dashboard.liveproduit',[
            'produit' => Produit::OrderBy('created_at','DESC')->take(5)->get()
        ]);
    }
}
