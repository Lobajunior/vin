<?php

namespace App\Http\Livewire;

use App\Models\Produit;
use Livewire\Component;
use App\Models\Commande;

class LiveCommande extends Component
{

    public $id_com ,$destination , $code, $montant , $etat  , $date, $slug_commande ,
     $lis_produit_commander ,$search , $datedebutSelect , $datefinSelect, $prixfinSelect , $prixdebutSelect ;

     public  $commandes ;

     public  $id_user = NULL ;
     public  $show_filter_date = False ;
     public  $show_filter_montant = False ;

    protected $listeners=['Supprimer_commande' , 'terminer_commande'];


    function mount()  {
        $this->commandes = Commande::Where('destination','LIKE','%'.$this->search.'%')->OrderBy('created_at','DESC')->get() ;
    }

    protected $rules=[
        'datedebutSelect' =>  ['required','date'],
        'datefinSelect' =>  ['required','date'],
    ];

    protected $messages = [
        'datedebutSelect.required' => "veuillez renseignez ce champs",
        'datedebutSelect.date' => "Minimum 3 caractere",
        'datefinSelect.required' => "Une date de fin  est requise",
        'datefinSelect.datefinSelect' => "Minimum 3 caractere",
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function deleteOrder($id_commande)
    {
        $commande = Commande::find($id_commande);

        if($commande){
            $this->dispatchBrowserEvent('swal:modalDeleteCommande', [
                'type' => 'warning',
                'text' => "Voulez-vous vraiment suprimer cette commande ($commande->code)",
                'title' => "Attention !!",
                'id' => $commande->id
            ]);
        }
    }

    public function Supprimer_commande($id_commande)
    {
        $commande = Commande::find($id_commande);

        if($commande){
            $commande->delete();

            $this->dispatchBrowserEvent('swal:modalSupprimer', [
                'type' => 'success',
                'text' => "Commande Supprimer ",
                'title' => "Success!!",
            ]);
        }
    }

    function show_more_detail_commande($id_commande)  {
        $commande = Commande::find($id_commande) ;
            if($commande){
                $this->id_com = $commande->id ;
                $this->destination = $commande->destination ;
                $this->code = $commande->code ;
                $this->montant = $commande->prix_total ;
                $this->etat = $commande->status ;
                $this->id_user = $commande->user_id ;
                $this->date = $commande->date ;
                $this->slug_commande = $commande->slug ;

                $this->lis_produit_commander = Produit::query()
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
                        ->take(4)
                        ->get();
            }
    }

    function finish_commande($id_commande) {
        $commande = Commande::find($id_commande);

        if($commande){
            $this->dispatchBrowserEvent('swal:modalFinishOrder', [
                'type' => 'info',
                'text' => "Marquez la commande comme étant terminer ?",
                'title' => "Message !!",
                'id' => $commande->id
            ]);
        }
    }

    function terminer_commande($id_commande) {
        $commande = Commande::find($id_commande);

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

        if($commande){
            foreach($produit_commander as $item_produit){

                if( $item_produit->qte_stock >  0){
                    $item_produit->qte_stock = (intval($item_produit->qte_stock) - intval($item_produit->quantity));
                    $item_produit->update();
                }else{
                    $this->dispatchBrowserEvent('swal:modalSupprimer', [
                        'type' => 'error',
                        'text' => "Le produit ($item_produit->libelle) est en rupture de stock , Vueillez incrementer le stock dans la section produit pour le produit cible ",
                        'title' => "Interruption!!",
                    ]);

                    return redirect()->back();
                }
            }

            $commande->status = 1 ;
            $commande->update();


            $this->dispatchBrowserEvent('swal:modalSupprimer', [
                'type' => 'success',
                'text' => "Commande Terminer ",
                'title' => "Success!!",
            ]);

            $this->show_more_detail_commande($id_commande);
        }
    }

    function set_show_filter_date() : void {
        $this->show_filter_date = !$this->show_filter_date ;
    }

    function set_show_filter_montant() : void {
        $this->show_filter_montant = !$this->show_filter_montant ;
    }

    function reset_show_filter() : void {
        $this->show_filter_montant = False ;
        $this->show_filter_date = False;
    }

    function filter_order_by_date()  {

        // dd($this->prixfinSelect , intval($this->prixdebutSelect));
        $this->validate();

        $this->commandes = Commande::Where('destination','LIKE','%'.$this->search.'%')
                            ->WhereBetween("created_at", [$this->datedebutSelect, $this->datefinSelect])
                            // ->WhereBetween("prix_total", [intval($this->prixdebutSelect), intval($this->prixfinSelect)])
                            ->OrderBy('created_at','DESC')
                            ->get() ;

    }

    function filter_order_by_price() {

        $this->commandes = Commande::Where('destination','LIKE','%'.$this->search.'%')
                            // ->WhereBetween("created_at", [$this->datedebutSelect, $this->datefinSelect])
                            ->WhereBetween("prix_total", [intval($this->prixdebutSelect), intval($this->prixfinSelect)])
                            ->OrderBy('created_at','DESC')
                            ->get();
    }

    public function render()
    {
        return view('livewire.live-commande');
    }
}
