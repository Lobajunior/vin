<?php

namespace App\Http\Livewire\Frontend\Tooltip;

use App\Models\Favoris;
use App\Models\Produit;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Liked extends Component
{
    public $id_produit; 

    function mount($id) : void {
     $produit =   Produit::find($id);
     $this->id_produit = $produit->id;
    }

    function liker()  {
    
        if(!Auth::user()){
            return redirect()->to('login');
        }
      $produit =  Produit::find($this->id_produit);
        if(isset($produit) && !is_null($produit) ){

            $favoris_exist = Favoris::where('produit_id',$produit->id)->where('user_id',Auth::user()->id)->first();
            if($favoris_exist){
                $this->dispatchBrowserEvent('NotifyLikedExist', [
                    'type' => 'warning',  
                    'message' => 'le produit existe deja a vos favoris ', 
                ]);


                return redirect()->back();
            }

            $favoris = new Favoris;
            $favoris->produit_id = $produit->id;
            $favoris->user_id = Auth::user()->id;
            $favoris->slug =  "SELONTOI-favoris".Str::slug("$produit->id".Hash::make($produit->created_at),"-"); 

            $favoris->save();

            if($favoris->save()){
                $this->dispatchBrowserEvent('NotifyLiked');
                $this->reset();
            }

        }
    }

    public function render()
    {
        return view('livewire.frontend.tooltip.liked');
    }
}
