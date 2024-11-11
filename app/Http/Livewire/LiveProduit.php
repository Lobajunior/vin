<?php

namespace App\Http\Livewire;

use App\Models\Promo;
use App\Models\Produit;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\SousCategorie;
use Intervention\Image\Image;
use Livewire\WithFileUploads;
use Image as InterventionImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class LiveProduit extends Component
{
    use WithFileUploads;


    public $libelle , $prix ,$etat_produit,$pointure, $type ,
        $description , $qte_stock,$selectSousCat, $photo_principales ,
         $id_produit, $key_img, $key_color, $path_img_view ,$search ,
         $SelectCouleur ;

    public $AsPhotoPrincip = null ;
    public $paginateNumber = 10;

    public $promo_date_debut , $promo_nb_jours,$promo_pourcentage ;
    public $colors_produit = [];
    public $tailles_produit = [];
    public $images_secondaires = [];
    public $selectAjoutImagesAtProduit ;
    public $ToggleAjoutImages = FALSE;
    public $ToggleAjoutCouleur = FALSE;

    protected $queryString =[
        'search' => ['except'=> '']
    ];

    protected $listeners = ['SuprimerProduit'];

    public function changeToggleAjoutImages()
    {
        $this->ToggleAjoutImages = !$this->ToggleAjoutImages ;
    }

    public function changeToggleAjoutCouleur()
    {
        $this->ToggleAjoutCouleur = !$this->ToggleAjoutCouleur ;
    }

    public function editProduit($id_produit)
    {
        $produit = Produit::find($id_produit);
        if($produit){
            $this->id_produit = $produit->id;
            $this->libelle = $produit->libelle;
            $this->prix = $produit->prix;
            $this->type = $produit->type;
            $this->description = $produit->description;
            $this->selectSousCat = $produit->sousCategorie_id;
            $this->qte_stock = $produit->qte_stock;
            $this->pointure = $produit->pointure;
        }
    }

    public function changeProduit()
    {
        $produit = Produit::find($this->id_produit);
        if($produit){
            $produit->libelle = $this->libelle ;
            $produit->prix = $this->prix ;
            $produit->type = $this->type ;
            $produit->sousCategorie_id = $this->selectSousCat ;
            $produit->qte_stock = $this->qte_stock ;
            $produit->pointure = $this->pointure ;


            if (!is_null($this->AsPhotoPrincip)) {

                $doc_path = "Backend/images/Produit/$produit->photo";
                if (File::exists($doc_path)) {
                    File::delete($doc_path);
                }

                $img = $this->AsPhotoPrincip;
                    $photo_produit = md5($img->getClientOriginalExtension().time()."++").".".$img->getClientOriginalExtension();
                    $source = $img;
                    $target = 'Backend/images/Produit/'.$photo_produit;
                    InterventionImage::make($source)->fit(800,600)->save($target);//taille de la photo
                    $produit->photo   =  $photo_produit;
            }

            $produit->update();
            if($produit->update()){
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',
                    'message' => 'Produit Modifier avec success',
                    'text' => "Merci !!"
                ]);

                $this->reset();
                $this->dispatchBrowserEvent('closeModalEditProduit');
            }
        }
    }

    public function deleteProduit($id_produit)
    {
        $produit = Produit::find($id_produit);
        if($produit){
            $this->dispatchBrowserEvent('swal:modalDeleteProduit', [
                'type' => 'warning',
                'text' => "Etes vous sur de vouloir suprimer ce Produit ?",
                'title' => "Attention !",
                'id' => $produit->id
            ]);
        }
    }

    public function SuprimerProduit($id_produit)
    {
        $produit = Produit::find($id_produit);

        if($produit){
            $doc_path = "Backend/images/Produit/$produit->photo";
            if (File::exists($doc_path)) {
                File::delete($doc_path);
            }

            $doc_path2 = $produit->images_secondaires;
                if(is_array($doc_path2) || is_object($doc_path2)){
                    foreach ($doc_path2 as $photo) {
                        $doc_path2 = "Backend/images/Produit/$photo";
                            if (File::exists($doc_path2)) {
                                File::delete($doc_path2);
                            }
                    }
                }

            $produit->delete();

            $this->dispatchBrowserEvent('swal:modalSupprimer', [
                'type' => 'success',
                'text' => "Produit Supprimer avec Succes",
                'title' => "Success",
            ]);

        }

    }

    public function InfoProduit($id_produit)
    {
        $produit = Produit::find($id_produit);
        if($produit){
            $this->id_produit = $produit->id;
            $this->libelle = $produit->libelle;
            $this->prix = $produit->prix;
            $this->type = $produit->type;
            $this->description = $produit->description;
            $this->selectSousCat = $produit->sousCategorie_id;
            $this->qte_stock = $produit->qte_stock;
            $this->colors_produit = $produit->couleur;
            $this->tailles_produit = $produit->taille;
            $this->photo_principales = $produit->photo;
            $this->images_secondaires = $produit->images_secondaires;
            $this->etat_produit = $produit->etat;
        }
    }

    public function changeEtatProduit()
    {
        $produit = Produit::find($this->id_produit);
        if($produit){
            if($produit->etat == 0){
                $produit->etat = 1;
                $produit->update();
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',
                    'message' => "Le Produit viens d'etre activer ",
                    'text' => "Cool !!"
                ]);
            }else{
                $produit->etat = 0 ;
                $produit->update();
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'info',
                    'message' => 'Vous venez de desactiver le produit',
                    'text' => "Attention !!"
                ]);
            }
        }
    }

    public function Ajout_ImagesSecondaire_atProduct()
    {
        $produit = Produit::find($this->id_produit);
        if($produit){
            if(!is_null($produit->images_secondaires)){
                if ($this->selectAjoutImagesAtProduit) {
                    $n2=0;
                    foreach($this->selectAjoutImagesAtProduit as $img){
                        $n2++;
                        $photos = array();

                        $imageSecond = md5($img->getClientOriginalExtension().time()).$n2.".".$img->getClientOriginalExtension();
                        $source = $img;
                        $waterMarkUrl = public_path('Backend/images/logi_img.png');
                        $target = 'Backend/images/Produit/' .$imageSecond;
                        InterventionImage::make($source)->fit(800,600)->insert($waterMarkUrl,'bottom-left',3,3)->save($target);
                        array_push($photos, $imageSecond);
                    }

                    $produit->images_secondaires = array_merge($produit->images_secondaires,$photos);
                }

                $produit->update();
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',
                    'message' => "Vous venez d'ajouter des Images ",
                    'text' => "Cool !!"
                ]);

         $this->dispatchBrowserEvent('closeModalInfoProduit');

            }else{
                if ($this->selectAjoutImagesAtProduit) {
                    $n2=0;
                    $photos = array();

                    foreach($this->selectAjoutImagesAtProduit as $img){
                        $n2++;
                        $imageSecond = md5($img->getClientOriginalExtension().time()).$n2.".".$img->getClientOriginalExtension();
                        $source = $img;
                        $waterMarkUrl = public_path('Backend/images/logi_img.png');
                        $target = 'Backend/images/Produit/' .$imageSecond;
                        InterventionImage::make($source)->fit(800,600)->insert($waterMarkUrl,'bottom-left',3,3)->save($target);
                        array_push($photos, $imageSecond);
                    }

                    $produit->images_secondaires = $photos;
                }

                $produit->update();
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',
                    'message' => "Vous venez d'ajouter des Images ",
                    'text' => "Cool !!"
                ]);

         $this->dispatchBrowserEvent('closeModalInfoProduit');

            }


        }
    }


    public function deleteOneImage_atProduct($key_img)
    {
        $produit = Produit::find($this->id_produit);
        if($produit){
            $table_img = $produit->images_secondaires;
            $nom = $table_img[$key_img];
            unset($table_img[$key_img]);
            $produit->images_secondaires= $table_img ;

                $doc_path = "Backend/images/Produit/$nom";
                if (File::exists($doc_path)) {
                    File::delete($doc_path);
                }

                $produit->update();
                    $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                        'type' => 'error',
                        'message' => "Vous venez de supprimer une Images ",
                        'text' => "Suppression !!"
                    ]);

                $this->dispatchBrowserEvent('closeModalInfoProduit');
            }
    }

    public function afficheImgProduit($key_img)
    {
        $produit = Produit::find($this->id_produit);
        if($produit){
            $table_img = $produit->images_secondaires;
            $nom = $table_img[$key_img];
            $this->path_img_view = $nom;
        }
    }

    public function AjoutCouleurAtProduct()
    {
        $produit = Produit::find($this->id_produit);
        if($produit){
            $table_color = is_null($produit->couleur) ? [ ] :  $produit->couleur;
            array_push($table_color, $this->SelectCouleur);

            $produit->couleur = $table_color ;
            $produit->update();
            if($produit->update()){
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'success',
                    'message' => "Vous venez de d'ajouter une couleur a ce produit  ",
                    'text' => "Merci !!"
                ]);

                $this->changeToggleAjoutCouleur();
                $this->dispatchBrowserEvent('closeModalInfoProduit');
            }
        }
    }

    public function deleteOneColor_atProduct($key_color)
    {
        $produit = Produit::find($this->id_produit);
        if($produit){
            $table_color = $produit->couleur;
            unset($table_color[$key_color]);
            $produit->couleur= $table_color ;

            $produit->update();
            if($produit->update()){
                $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                    'type' => 'error',
                    'message' => "Vous venez de Supprimer une couleur a ce produit  ",
                    'text' => "Supression !!"
                ]);
                $this->dispatchBrowserEvent('closeModalInfoProduit');
            }
        }
    }

    public function create_promotion()
    {
        $produit = Produit::find($this->id_produit);
        if($produit){
            $this->liblle = $produit->libelle;
        }
    }

    public function addPromotionProduct()
    {
        $produit = Produit::find($this->id_produit);
        if($produit){

            $this->validate([
                'promo_pourcentage' => ['required'],
                'promo_nb_jours' => ['required'],
                'promo_date_debut' => ['required'],
            ]);

            if(date('Y-m-d', strtotime($this->promo_date_debut)) < date('Y-m-d')){
                $date_debut = date('Y-m-d');
            }else{
                $date_debut = date('Y-m-d', strtotime($this->promo_date_debut));
            }
            $date_fin =  \Carbon\Carbon::createFromDate($date_debut)->addDays($this->promo_nb_jours);

            $produit_promoter = Promo::where('produit_id',$this->id_produit)->where('produit_id','!=',null)->where('date_fin','>=', date('Y-m-d'))->first();

            $produit = Produit::where('id',$this->id_produit)->first();

            $a_reduire = (str_replace(' ','', $produit->prix) * $this->promo_pourcentage) / 100;

            if(!is_null($produit_promoter)){
                $date_update_debut = \Carbon\Carbon::createFromDate(date('Y-m-d'));
                $date_update_fin = \Carbon\Carbon::createFromDate($produit_promoter->date_fin);
                $difference_de_jours = $date_update_fin->diffInDays($date_update_debut);
                $date_de_fin = \Carbon\Carbon::createFromDate($date_debut)->addDays($this->promo_nb_jours + $difference_de_jours);
                $produit_promoter->update([
                    'etat'=> 1,
                    'prix' => str_replace(' ','', $produit->prix) - $a_reduire,
                    'nb_promo' =>  $this->promo_pourcentage,
                    'date_debut' => $date_debut,
                    'nb_jours' => $this->promo_nb_jours,
                    'date_fin' => $date_de_fin,
                    'slug' => Str::slug("$this->id_produit". Hash::make($produit->libelle),"-"),
                    'produit_id' => $produit->id,
                ]);
            }else{

                $promo = Promo::create([
                    'etat'=> 1,
                    'produit_id' => $produit->id,
                    'nb_promo' =>  $this->promo_pourcentage,
                    'nb_jours' => $this->promo_nb_jours,
                    'prix' =>  str_replace(' ','', $produit->prix) - $a_reduire,
                    'date_debut' => $date_debut,
                    'slug' => Str::slug("$this->id_produit". Hash::make($produit->libelle),"-"),
                    'date_fin' => date('Y-m-d', strtotime($date_fin))
                ]);
            }

            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',
                'message' => "Vous venez de creer une Promotion pour ce produit  ",
                'text' => "Promotion de Produit !!"
            ]);


            $this->dispatchBrowserEvent('closeModalInfoProduit');

            return redirect()->back();


        }
    }


    function ToggleIsDjassa($id_produit) : void {
        $produit = Produit::find($id_produit);
        if($produit){
            $produit->is_djassa == 0 ? $produit->is_djassa = 1 : $produit->is_djassa = 0;

            $produit->update();

            $this->dispatchBrowserEvent('swal:modalAjoutNiveau', [
                'type' => 'success',
                'message' => "Operation effectuée avec succes",
                'text' => "Mode Djassa !!"
            ]);
        }
    }

    public function loadMore(){
        $this->paginateNumber += 10 ;
    }

    public function render()
    {
        return view('livewire.live-produit',[
            'product' => Produit::Where('libelle','LIKE','%'.$this->search.'%')->OrderBy('id', 'DESC')->take($this->paginateNumber)->get(),
            'souscat' => SousCategorie::all()
        ]);
    }
}
