<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class Liveusers extends Component
{
    public function render()
    {
        return view('livewire.dashboard.liveusers',[
            'utilisateur' => User::where('role','Utilisateurs')->OrWhere('role','SuperAdmin')->OrderBy('created_at','DESC')->take(4)->get()
        ]);
    }
}
