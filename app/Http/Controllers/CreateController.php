<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\About;
use App\Models\Produit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Image as InterventionImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CreateController extends Controller
{
    public function submit_produit(Request $request)
    {

       $exist_produit = Produit::where('libelle',$request->libelle)->where('sousCategorie_id',$request->id_souscat)->first();
       if($exist_produit){
            session()->flash('Exist_produit',"Le produit que vous essayez d'enregistrer exise deja");
            return redirect()->back();
       }


         $request->validate([
            'libelle' => ['required', 'string', 'max:200'],
            'prix' => ['required'],
            'type' => ['required'],
            'id_souscat' => ['required'],
        ],['libelle.required' => "Un Nom de produits est requis"]);


                $produit = new Produit;
                $produit->libelle = $request->libelle;
                $produit->sousCategorie_id = $request->id_souscat;
                $produit->taille = $request->SelectTaille ;
                $produit->couleur = $request->SelectCouleur;
                $produit->prix = $request->prix;
                $produit->type = $request->type;
                if($request->qte){
                    $produit->qte_stock = $request->qte;
                }else{
                    $produit->qte_stock = 1 ;
                }
                if($request->description){
                    $produit->description = $request->description;
                }

                if (request()->file('photoPrincipale')) {
                    $img = request()->file('photoPrincipale');
                        $image_principale = md5($img->getClientOriginalExtension().time().$request->contactWhatsapp).".".$img->getClientOriginalExtension();
                        $source = $img;
                        $waterMarkUrl = public_path('Backend/images/logi_img.png');
                        $target = 'Backend/images/Produit/'.$image_principale;
                        InterventionImage::make($source->getRealPath())->fit(800,800)->insert($waterMarkUrl,'bottom-left',3,3)->save($target);
                        $produit->photo   =  $image_principale;
                    }


                    if (request()->file('SelectImage')) {

                        $n2=0;
                        $photos = array();

                        foreach(request()->file('SelectImage') as $img){
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

                    $produit->slug =  "SELONTOI".Str::slug("$request->libelle".Hash::make($request->libelle),"-");

                    $produit->save();

                    if($produit->save()){
                        session()->flash('save_produit',"Le produit a ete enregistrer");
                        return redirect()->back();
                    }else{
                        session()->flash('notSave_produit',"Un probleme est survenue");
                        return redirect()->back();
                    }
    }



    public function changeDescription(Request $request, $slug)
    {
        $produit = Produit::where('slug',$slug)->first();
        if($produit){
            if($request->description){
                $produit->description = $request->description ;
                $produit->update();

                session()->flash('description_produit_change', "La description du produit ( ".$produit->libelle." ) a bien ete modifier");
                return redirect()->to('/dashboard/produits');
            }else{
                return redirect()->back();
            }
        }

    }


    public function modif_descriptionAbout(Request $request)
    {
        $a_propos = About::first();

        $a_propos->description = $request->description ;
        $a_propos->update();

        session()->flash('description_about_change', "La description  a bien ete modifier");
        return redirect()->to('/dashboard/a_propos');
    }


    //creation d'un blog

    function submit_Blog(Request $request) : Object {

        
        $exist_blog = Blog::where('titre',$request->titre)->where('blog_cat_id',$request->id_cat)->first();
        if($exist_blog){
             session()->flash('Exist_blog',"Le blog que vous essayez d'enregistrer exise deja");
             return redirect()->back();
        }

        $request->validate([
            'titre' => ['required', 'string', 'max:200'],
            'description' => ['required'],
            'id_cat' => ['required'],
        ],['titre.required' => "Un Titre de blog est requis"]);


        $blog = new Blog;
        $blog->titre = htmlspecialchars($request->titre);
        $blog->description = $request->description;
        $blog->blog_cat_id = $request->id_cat;
        if (request()->file('photo')) {
            $img = request()->file('photo');
                $image_principale = md5($img->getClientOriginalExtension().time().$request->contactWhatsapp).".".$img->getClientOriginalExtension();
                $source = $img;
                $waterMarkUrl = public_path('Backend/images/logi_img.png');
                $target = 'Backend/images/Blog/'.$image_principale;
                InterventionImage::make($source->getRealPath())->fit(300,250)->insert($waterMarkUrl,'bottom-left',3,3)->save($target);
                $blog->photo   =  $image_principale;
            }


            if (request()->file('SelectImage')) {

                $n2=0;
                $photos = array();

                foreach(request()->file('SelectImage') as $img){
                    $n2++;
                    $imageSecond = md5($img->getClientOriginalExtension().time()).$n2.".".$img->getClientOriginalExtension();
                    $source = $img;
                    $waterMarkUrl = public_path('Backend/images/logi_img.png');
                    $target = 'Backend/images/Blog/' .$imageSecond;
                    InterventionImage::make($source)->fit(300,250)->insert($waterMarkUrl,'bottom-left',3,3)->save($target);
                    array_push($photos, $imageSecond);
                }

                $blog->image_secondaire = $photos;
            }

            $blog->slug =  "SELONTOI".Str::slug(Hash::make($request->fingerprint()),"-"); 

            $blog->save();

            if($blog->save()){
                session()->flash('succes_blog',"Le blog a ete enregistrer ");
                return redirect()->back();
            }
          
    }


    function change_Blog(Request $request, $id) : Object {
        $blog = Blog::find($id);

        if($blog){
            $blog->titre = htmlspecialchars($request->titre);
        $blog->description = $request->description;
        if($request->id_cat){
            $blog->blog_cat_id = $request->id_cat;
        }
        if (request()->file('photo')) {

            $doc_path = "Backend/images/Blog/$blog->photo";
            if (File::exists($doc_path)) {
                File::delete($doc_path);
            }

            $img = request()->file('photo');
                $image_principale = md5($img->getClientOriginalExtension().time().$request->contactWhatsapp).".".$img->getClientOriginalExtension();
                $source = $img;
                $waterMarkUrl = public_path('Backend/images/logi_img.png');
                $target = 'Backend/images/Blog/'.$image_principale;
                InterventionImage::make($source->getRealPath())->fit(300,250)->save($target);
                $blog->photo   =  $image_principale;
            }


            if (request()->file('SelectImage')) {

                $doc_path2 = $blog->image_secondaire;
                if(is_array($doc_path2) || is_object($doc_path2)){
                    foreach ($doc_path2 as $photo) {
                        $doc_path2 = "Backend/images/Blog/$photo";
                            if (File::exists($doc_path2)) {
                                File::delete($doc_path2);
                            }
                    }
                }

                $n2=0;
                $photos = array();

                foreach(request()->file('SelectImage') as $img){
                    $n2++;
                    $imageSecond = md5($img->getClientOriginalExtension().time()).$n2.".".$img->getClientOriginalExtension();
                    $source = $img;
                    $waterMarkUrl = public_path('Backend/images/logi_img.png');
                    $target = 'Backend/images/Blog/' .$imageSecond;
                    InterventionImage::make($source)->fit(300,250)->save($target);
                    array_push($photos, $imageSecond);
                }

                $blog->image_secondaire = $photos;
            }
        }

        $blog->update();

        if($blog->update()){
            session()->flash('modify_success',"Le blog a ete modifier ");
            return redirect()->to('/dashboard/blog');
        }
    }
}
