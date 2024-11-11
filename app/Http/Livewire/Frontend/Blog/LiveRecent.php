<?php

namespace App\Http\Livewire\Frontend\Blog;

use App\Models\Produit;
use Livewire\Component;

class LiveRecent extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog.live-recent',[
            'produit_recent' => Produit::where('etat',1)->where('is_djassa',0)->OrderBy('created_at','DESC')->take(4)->get()
        ]);
    }
}
