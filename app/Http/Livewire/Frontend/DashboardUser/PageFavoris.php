<?php

namespace App\Http\Livewire\Frontend\DashboardUser;

use App\Models\Favoris;
use App\Models\Produit;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PageFavoris extends Component
{

    function deletedFavoris($id_produit)  {
        if(!Auth::user()){
            return redirect()->to('login');
        }
        $produit = Produit::find($id_produit);
        if($produit){
            $favoris = Favoris::where('produit_id',$produit->id)->where('user_id',Auth::user()->id)->first();
                if(isset($favoris)){
                    $favoris->delete();
                    $this->dispatchBrowserEvent('NotifyLikedExist', [
                        'type' => 'warning',  
                        'message' => 'le produit a été supprimer de vos favoris ', 
                    ]);
                }
        }
    }

    public function render()
    {
        return view('livewire.frontend.dashboard-user.page-favoris',[
            'produitFav' => Produit::query()
                            ->select('produits.id', 'produits.sousCategorie_id', 'produits.libelle',
                            'produits.photo', 'produits.images_secondaires', 'produits.taille',
                            'produits.couleur', 'produits.prix', 'produits.type','produits.slug',
                            'produits.etat', 'produits.qte_stock', 'produits.description', 'produits.pointure',
                            'favoris.id as Idfavoris','favoris.produit_id','favoris.slug as SlugFav','favoris.user_id'
                            ,'users.id as Idcat','users.nom','users.slug as SlugUser')
                            ->join('favoris','favoris.produit_id','=','produits.id')
                            ->join('users','favoris.user_id','=','users.id')
                            ->where('users.id',Auth::user()->id)
                            ->where('produits.is_djassa',0)
                            ->where('produits.etat',1)
                            ->get()
        ]);
    }
}
