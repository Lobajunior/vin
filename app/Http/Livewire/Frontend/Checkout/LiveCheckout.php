<?php

namespace App\Http\Livewire\Frontend\Checkout;

use GuzzleHttp\Client;
use App\Models\Produit;
use Livewire\Component;
use App\Models\Commande;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProduitCommander;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;



class LiveCheckout extends Component
{

    public $adresse,$contact,$selectLivraison, $selectMethodPaiement, $commandeId , $ItemcommandeRecu;

    protected $rules=[
        'adresse' =>  ['required','min:3'],
        'contact' =>  ['required'],
        'selectMethodPaiement' =>  ['required'],
    ];

    protected $messages = [
        'adresse.required' => "Une adresse est requise",
        'adresse.adresse' => "Minimum 3 caractere",
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    function mount()  {
        if(Cart::Content()->count() <= 0 || !Cart::content() ){
            return redirect()->to('/produits');
        }
        
    }

    function commander(Request $request)  {

        $this->validate();
        $commande = New Commande;
        $commande->user_id = Auth::user()->id;
        $commande->slug = Str::slug($request->token.'-'.rand(000, 999).Auth::user()->nom.$commande->id);
        $commande->details = $this->contact.",".$this->selectLivraison .",".$this->selectMethodPaiement ;
        $commande->destination = $this->adresse;
        $commande->date = date('Y-m-d');
        $commande->prix_total = str_replace(',','', Cart::subtotal());
        $commande->code = Auth::user()->nom.rand(000, 999);
        $commande->save();

        if(!is_null($commande)){ 

            if($this->selectMethodPaiement == "mobilemoney"){
                $id_trans = rand(100000000,999999999);
                $descriptions = "Reglage de facture ".Auth::user()->nom." ,pour ma commande ".$commande->code ;
                return $this->payment($id_trans,$commande->prix_total,$descriptions,$commande->id);
            }

                foreach (Cart::content() as $produit) {
                    $pc = New ProduitCommander;
                    $pc->produit_id = $produit->id;
                    $pc->commande_id = $commande->id;
                    $pc->prix = $produit->price;
                    $pc->qte = $produit->qty;
                    $pc->slug = Str::slug($request->fingerprint().'-'.rand(000, 999).$produit->id);
                    $pc->save();

                    $prod = Produit::find($produit->id);
                    $prod->qte_stock = $prod->qte_stock - $produit->qty ;
                    $prod->update();
                }

                $this->dispatchBrowserEvent('NotifySuccess', [
                    'message' => 'Votre Commande a bien ete passer', 
                ]);
                Cart::destroy();
                $this->dispatchBrowserEvent('modalRecucommande');
                $this->get_produit_order($commande->id);
        }
        
    }
    
    function get_produit_order($order_id)  {
        $commande = Commande::find($order_id);
        if(isset($commande)){
            $this->ItemcommandeRecu = Produit::query()
                        ->select('produits.id','produits.libelle','produits.prix','produits.sousCategorie_id','produits.photo',
                        'produits.description','produits.slug as SlugProduit','produit_commanders.commande_id','produit_commanders.produit_id',
                        'produit_commanders.qte','produit_commanders.prix as PCprice',
                        'commandes.user_id','commandes.date','commandes.details','commandes.destination','commandes.code',
                        'commandes.prix_total','users.nom','users.prenom','users.email','users.phone')
                        ->join('produit_commanders','produit_commanders.produit_id','=','produits.id')
                        ->join('commandes','produit_commanders.commande_id','=','commandes.id')
                        ->join('users','commandes.user_id','=','users.id')
                        ->where('commandes.id',$commande->id)
                        ->get();
        }
    }

    public function payment($id_trans,$price,$descriptions,$commande_id){
        $var_apikey = "147167229663f3b40a30e706.04274844";
        $var_siteId = "935423";
       
        $cravate = [
            "apikey"=> $var_apikey,
            "site_id"=> $var_siteId,
            "transaction_id"=>  "$id_trans", //
            "amount"=> $price ? $price : 100,
            "currency"=> "XOF",
            "alternative_currency"=> "",
            "description"=> $descriptions,
            "customer_id"=> Auth::user()->id,
            "customer_name"=> Auth::user()->nom,
            "customer_email"=> Auth::user()->email,
            "customer_phone_number"=> Auth::user()->phone,
            "customer_address"=> "Antananarivo",
            "customer_city"=> Auth::user()->ville ? Auth::user()->ville : "Abidjan",
            "customer_country"=> "CI",
            "customer_state"=> "Cote d'ivoire",
            "customer_zip_code"=> "00225",
            "channels"=> "ALL",
            "metadata"=> "$commande_id",
            "lang"=> "FR",
        ];

        $client = new Client();

        $response = $client->post("https://api-checkout.cinetpay.com/v2/payment", [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $cravate
        ]);

        $body = $response->getBody();

        $dato = json_decode($body);
       
        $moncheckoutURL = $dato->data->payment_url ;

         return Redirect::away($moncheckoutURL);
    }

    public function render()
    {
        return view('livewire.frontend.checkout.live-checkout');
    }
}
