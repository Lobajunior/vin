<div  wire:ignore.self class="modal fade" id="InfosProduit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- <div class="overlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div> -->
            <div class="modal-header bg-info">
              <h4 class="modal-title">Infos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">



            <!-- Main content -->
                    <section class="content">

                        <!-- Default box -->
                        <div class="card card-solid">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-12 col-sm-12 col-lg-6">
                                <h3 class="d-inline-block d-sm-none">{{$libelle}} </h3>
                                <div class="col-12">
                                    <img src="../Backend/images/Produit/{{$photo_principales}}" class="product-image" alt="Product Image">
                                </div>
                                <div class="col-12 product-image-thumbs" >
                                    @if(!is_null($images_secondaires) && $images_secondaires > 0)
                                    @foreach($images_secondaires as $key => $ImgSecond)
                                        <div class="product-image-thumb active" style="margin-right: 0px!important; padding: 0.3%!important;" data-toggle="modal" data-target="#ViewImgProduct" wire:click="afficheImgProduit({{$key}})">
                                            <img src="../Backend/images/Produit/{{$ImgSecond}}" alt="Product Image">
                                        </div>

                                        <div class="card-tools">
                                            <button type="button" wire:click="deleteOneImage_atProduct({{$key}})" style="padding-left: 0px!important; padding-top: 0px!important;" class="btn btn-tool" ><i class="fas fa-times"></i>
                                            </button>
                                            </div>
                                    @endforeach
                                    @endif
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <div class="col-10">
                                            <button type="reset" class="btn @if(!$ToggleAjoutImages) btn-info @else btn-danger @endif btn-flat " data-toggle="modal" data-target="#" wire:click="changeToggleAjoutImages">
                                                <i class="fas @if(!$ToggleAjoutImages) fa-plus-circle @else fa-delete @endif"></i>
                                                <span> @if(!$ToggleAjoutImages) Ajouter d'autres images @else Fermer @endif</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @if($ToggleAjoutImages)
                                <form wire:submit.prevent="Ajout_ImagesSecondaire_atProduct">
                                <div class="col-12 mt-3">
                                    <div class="form-group" Style="margin-bottom: 0px!important;">
                                        <label>Selectionnez les images taille: 700 px /400 px </label>
                                        <input type="file" wire:model="selectAjoutImagesAtProduit" multiple="" class="form-control" >
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-xs">Sauvegarder les modifications</button>
                                </form>
                                @endif
                            </div>

                           
                            <div class="col-12 col-sm-12 col-lg-6">
                                <h3 class="my-3">{{$libelle}}</h3>
                                <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>

                                <hr>
                                @if($colors_produit >0 && !is_null($colors_produit))
                                <h4>Couleurs Valide</h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    @foreach($colors_produit as $colors)
                                <label class="btn btn-default text-center active">
                                    
                                    <i class="fas fa-circle fa-2x text-{{$colors}}"></i>
                                </label>
                                @endforeach
                                </div>
                                @endif

                                @if($tailles_produit >0 && !is_null($tailles_produit))
                                <h4 class="mt-3">Taille <small>disponible</small></h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @foreach($tailles_produit as $tailles)
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                    <span class="text-xl">{{$tailles}}</span>
                                </label>
                                @endforeach
                                </div>
                                @endif

                                <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                    {{$prix}} FCFA
                                </h2>
                                <h4 class="mt-0">
                                    <small>Ex Tax: $80.00 </small>
                                </h4>
                                </div>

                                <div class="mt-2">
                                @if($etat_produit == 0)
                                <div class="btn btn-success btn-lg btn-flat mt-2" wire:click="changeEtatProduit">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Activer
                                </div>
                                @else
                                <div class="btn btn-danger btn-lg btn-flat mt-2" wire:click="changeEtatProduit">
                                    <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                    Desactiver
                                </div>
                                @endif

                                    <div wire:click="create_promotion" data-toggle="modal" data-target="#ajoutPromo" id="btnPromotion" class="btn btn-info btn-lg  btn-flat btn-sm mt-2" style="background-color: #170d7b;">
                                        <i class="fas fa-plus-circle fa-lg mr-2"></i>
                                        Promo
                                    </div>

                                </div>


                                <div class="mt-4 product-share">
                                <a href="#" class="text-gray">
                                    <i class="fab fa-facebook-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fab fa-twitter-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-envelope-square fa-2x"></i>
                                </a>
                                <a href="#" class="text-gray">
                                    <i class="fas fa-rss-square fa-2x"></i>
                                </a>
                                </div>

                            </div>
                            </div>
                            <div class="row mt-4">
                            <nav class="w-100">
                                <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link @if($ToggleAjoutCouleur == FALSE) active @endif" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Commentaires</a>
                                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Notes</a>
                                @if($tailles_produit >0 && !is_null($tailles_produit)) <a class="nav-item nav-link" id="product-taille-tab" data-toggle="tab" href="#product-taille" role="tab" aria-controls="product-taille" aria-selected="false">Tailles</a> @endif
                                <a class="nav-item nav-link @if($ToggleAjoutCouleur == TRUE) active  @endif" id="product-color-tab" data-toggle="tab" href="#product-color" role="tab" aria-controls="product-color" aria-selected="false">Couleurs</a>
                                </div>
                            </nav>
                            <div class="tab-content p-3" id="nav-tabContent">
                                <div class="tab-pane fade  @if($ToggleAjoutCouleur == FALSE) show active @endif" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {!! $description !!}
                                               <a href="/dashboard/get_modal_modify_description/{{$id_produit}}" ><button type="reset"  class="btn  btn-warning btn-flat mt-2" data-toggle="modal" data-target="#">
                                                    <i class="fas fa-edit"></i>
                                                    <span>modifier la description </span>
                                                </button>        </a> 
                                </div>
                                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                                <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> vitae vehicula placerat. </div>
                                <div class="tab-pane fade @if($ToggleAjoutCouleur == TRUE) show active  @endif" id="product-color" role="tabpanel" aria-labelledby="product-color-tab">
                                        <br>
                                        @if($ToggleAjoutCouleur == FALSE)
                                                <button type="reset" wire:click="changeToggleAjoutCouleur" class="btn  btn-success btn-flat " >
                                                    <i class="fas fa-plus-circle"></i>
                                                    <span>Ajouter une couleur</span>
                                                </button>

                                            @else
                                                <button type="reset" wire:click="changeToggleAjoutCouleur" class="btn  btn-danger btn-flat " >
                                                    <i class="fas fa-close"></i>
                                                    <span>Fermer la section d'ajout de couleur</span>
                                                </button>

                                            @endif


                                            @if($ToggleAjoutCouleur)
                                            <form wire:submit.prevent="AjoutCouleurAtProduct">

                                            <div class="form-group"  Style="margin-bottom: 3px!important;">
                                                <label>Couleurs</label>
                                                    <select class="custom-select"  wire:model.defer="SelectCouleur" data-placeholder="Couleurs..." style="width: 100%;">
                                                        <option value="red">Rouge</option>
                                                        <option value="green">Vert</option>
                                                        <option value="yellow">Jaune</option>
                                                        <option value="blue">Bleu</option>
                                                        <option value="purple">Violet</option>
                                                        <option value="orange">Orange</option>
                                                    </select>
                                            </div>

                                                <button type="submit" class="btn btn-success btn-xs">Sauvegarder le changement</button>
                                            </form>
                                            @endif


                                    @if($colors_produit >0 && !is_null($colors_produit))
                                        <p>
                                            @foreach($colors_produit as $key => $colors)
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                    <label class="btn btn-default text-center active">
                                                        <div class="card-tools">
                                                            <button type="button" wire:click="deleteOneColor_atProduct({{$key}})" style="padding-right: 0px!important; padding-top: 0px!important;" class="btn btn-tool" ><i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                        <i class="fas fa-circle fa-2x text-{{$colors}}"></i>
                                                    </label>
                                                </div>
                                            @endforeach
                                         </p>
                                         @else
                                         <h6 class="text-info"> Aucune couleurs n'a ete selectionner pour ce produit</h6>
                                        @endif
                                </div>
                                @if($tailles_produit >0 && !is_null($tailles_produit))
                                <div class="tab-pane fade" id="product-taille" role="tabpanel" aria-labelledby="product-taille-tab"> Liste des Tailles
                                        <br>

                                                <button type="reset" class="btn  btn-success btn-flat " data-toggle="modal" data-target="#">
                                                    <i class="fas fa-plus-circle"></i>
                                                    <span>Ajouter une taille</span>
                                                </button>

                                                <button type="reset" class="btn  btn-danger btn-flat" data-toggle="modal" data-target="#">
                                                    <i class="fas fa-trash"></i>
                                                    <span>Suprimer une taille</span>
                                                </button>


                                     @if($tailles_produit >0 && !is_null($tailles_produit))
                                        <p>
                                    @foreach($tailles_produit as $tailles)
                                                {{$tailles}} ,
                                    @endforeach
                                         </p>
                                         @else
                                         <h6 class="text-info"> Aucune Taille n'a ete selectionner pour ce produit</h6>
                                        @endif
                                </div>
                                @endif
                            </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </section>
                    <!-- /.content -->





            </div>
          </div>

          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->