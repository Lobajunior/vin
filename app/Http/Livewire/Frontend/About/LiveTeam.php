<?php

namespace App\Http\Livewire\Frontend\About;

use App\Models\Team;
use App\Models\User;
use Livewire\Component;

class LiveTeam extends Component
{
    public function render()
    {
        return view('livewire.frontend.about.live-team',[
            'teamEquipe' => Team::all(),
            'teamUser' => User::where('is_member',1)->get()
        ]);
    }
}
