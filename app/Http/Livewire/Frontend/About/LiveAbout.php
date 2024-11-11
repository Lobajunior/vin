<?php

namespace App\Http\Livewire\Frontend\About;

use App\Models\About;
use Livewire\Component;

class LiveAbout extends Component
{
    public function render()
    {
        return view('livewire.frontend.about.live-about',[
            'apropos' => About::first()
        ]);
    }
}
