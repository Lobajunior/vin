<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\About;
use App\Models\Favoris;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\CategorieBlog;
use App\Models\SousCategorie;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class GetDataController extends Controller
{
    public function index_home()
    {
        $user= Auth::user();

        if($user->role == "SuperAdmin"){
            $commande_last = Commande::OrderBy('created_at','DESC')->take(5)->get();
            return view('home',compact('commande_last'));
        }elseif($user->role == "Livreurs"){
            return view('home_livreur');
        }
    }

    function index_produits()  {
        
        $promation_produits = Produit::query()
                ->select('produits.id', 'produits.sousCategorie_id', 'produits.libelle',
                'produits.photo', 'produits.images_secondaires', 'produits.taille',
                'produits.couleur', 'produits.prix', 'produits.type', 'produits.slug',
                'produits.etat', 'produits.qte_stock', 'produits.description', 'produits.pointure',
                'promos.id as Idpromotion', 'promos.prix as PricePromoter', 'promos.etat as EtatPromoter',
                'promos.date_debut', 'promos.date_fin', 'promos.produit_id', 'promos.nb_promo', 'promos.nb_jours')
                ->join('promos','promos.produit_id','=','produits.id')
                ->where('promos.etat',1)
                ->where('promos.date_debut', '<=', date('Y-m-d'))
                ->where('promos.date_fin', '>=', date('Y-m-d'))
                ->count();

        // dd($promation_produits);

        return view('Backend/pages/Produit',compact('promation_produits'));
    }

    public function ajout_produit_modal()
    {
        $souscat = SousCategorie::all();
        return view('Backend/pages/produit/addProduit',compact('souscat'));
    }

    public function ajout_blog_page()
    {
        $catBlog = CategorieBlog::OrderBy('libelle','ASC')->get();
        return view('Backend/pages/Blog/addBlog',compact('catBlog'));
    }

    public function edit_blog_page($id)
    {
        $blog = Blog::find($id);
        if($blog){
            $catBlog = CategorieBlog::OrderBy('libelle','ASC')->get();
            return view('Backend/pages/Blog/editBlog',compact('catBlog','blog'));
        }else{
            return redirect()->back();
        }
       
    }


    public function GetModalDescription($id)
    {
        $produit = Produit::find($id);
        if($produit){
        return view('Backend/pages/produit/modal_get_description',compact('produit'));
        }
    }

 
    public function detailsProduits($slug)
    {
        $produitInfos = Produit::where('slug',$slug)->first();

        
    
        if(isset($produitInfos)){
        $produitInfos->increment('nb_view');
        $produitIFSouscat = Produit::where('sousCategorie_id',$produitInfos->sousCategorie_id)->get();
         //verifions si le produit existe deja dans les favoris de l'utilisateur
         
        return view('/Frontend/pages/details_produit', compact('produitInfos','produitIFSouscat'))  ;
        }else{
            return redirect()->to('/');
        }

    }

    public function detailsProdPromoOrIsdjassa($slug)
    {
        $produitpromoInfos = Produit::query()
                            ->select('produits.id', 'produits.sousCategorie_id', 'produits.libelle',
                             'produits.photo', 'produits.images_secondaires', 'produits.taille',
                             'produits.couleur', 'produits.prix', 'produits.type','produits.slug','produits.nb_view',
                             'produits.etat', 'produits.qte_stock', 'produits.description', 'produits.pointure','produits.created_at',
                              'promos.id as Idpromotion', 'promos.prix as PricePromoter', 'promos.etat as EtatPromoter',
                               'promos.date_debut', 'promos.date_fin', 'promos.produit_id', 'promos.nb_promo', 'promos.nb_jours')
                            ->join('promos','promos.produit_id','=','produits.id')
                            ->where('promos.etat',1)
                            ->where('produits.etat',1)
                            ->where('promos.date_debut', '<=', date('Y-m-d'))
                            ->where('promos.date_fin', '>=', date('Y-m-d'))
                            ->where('produits.slug',$slug)
                            ->first();
                            
    
        if($produitpromoInfos){
        $produitpromoInfos->increment('nb_view');
        $produitIFSouscat = Produit::where('sousCategorie_id',$produitpromoInfos->sousCategorie_id)->get();
        //verifions si le produit existe deja dans les favoris de l'utilisateur
             return view('/Frontend/pages/detail_produitPromo', compact('produitpromoInfos','produitIFSouscat'));
        }else{
               return redirect()->to('/');
           }
    }
 
    public function detailsCategorie($slug)
    {
        $categoryInfos = Categorie::where('slug',$slug)->first();
        if(!is_null($categoryInfos)){
         return view('/Frontend/pages/details_category', compact('categoryInfos'));
        }else{
        return redirect()->to('/ind');
        }
    }

    public function filtreDetails($slug)
    {
        $filtreInfos = SousCategorie::where('slug',$slug)->first();
        if(!is_null($filtreInfos)){
         return view('/Frontend/pages/details_filtre', compact('filtreInfos'));
        }else{
        return redirect()->to('/ind');
        }
    }


    function details_commande($slug)  {
        $commande = Commande::where('slug',$slug)->first() ;
        if($commande){

            $produit_of_order = Produit::query()
                        ->select('produits.id','produits.sousCategorie_id','produits.libelle','produits.photo','produits.images_secondaires'
                        ,'produits.taille','produits.couleur','produits.prix','produits.type','produits.etat','produits.qte_stock'
                        ,'produits.is_djassa','produits.description','produits.slug','produits.created_at','produit_commanders.id as idProdCom'
                        ,'produit_commanders.commande_id','produit_commanders.produit_id','produit_commanders.qte','produit_commanders.prix as prix_prodcom'
                        ,'produit_commanders.created_at as createdProdcom','commandes.id as IdCom','commandes.user_id','commandes.date','commandes.details'
                        ,'commandes.destination','commandes.status','commandes.code','commandes.prix_total'
                        )
                        ->join('produit_commanders','produit_commanders.produit_id','=','produits.id')
                        ->join('commandes','produit_commanders.commande_id','=','commandes.id')
                        ->where('commandes.id',$commande->id)
                        ->get();
                        
            return view('Backend/pages/details_commande', compact('produit_of_order','commande'));
        }
    }

    function checked_order($slug)  {
        $commande = Commande::where('slug',$slug)->first() ;
        if($commande){
            $produit_commander = Produit::query()
                        ->select('produits.id','produits.sousCategorie_id','produits.libelle','produits.photo','produits.images_secondaires'
                        ,'produits.taille','produits.couleur','produits.prix','produits.type','produits.etat','produits.qte_stock'
                        ,'produits.is_djassa','produits.description','produits.slug','produits.created_at','produit_commanders.id as idProdCom'
                        ,'produit_commanders.commande_id','produit_commanders.produit_id','produit_commanders.qte as quantity','produit_commanders.prix as prix_prodcom'
                        ,'produit_commanders.created_at as createdProdcom','commandes.id as IdCom','commandes.user_id','commandes.date','commandes.details'
                        ,'commandes.destination','commandes.status','commandes.code','commandes.prix_total'
                        )
                        ->join('produit_commanders','produit_commanders.produit_id','=','produits.id')
                        ->join('commandes','produit_commanders.commande_id','=','commandes.id')
                        ->where('commandes.id',$commande->id)
                        ->get();

                
            foreach($produit_commander as $item_produit){
    
                if( $item_produit->qte_stock >  0){
                    $item_produit->qte_stock = (intval($item_produit->qte_stock) - intval($item_produit->quantity));
                    $item_produit->update();
                }else{
                    return redirect()->back()->with('error_quantity_product', "Le produit ($item_produit->libelle) est en rupture de stock , Vueillez incrementer le stock dans la section produit pour le produit cible");
                }
            }

            $commande->status = 1 ;
            $commande->update();

            return redirect()->back()->with('success_checked_order', "La commande a été terminer avec succes");
        }
    }

}
