<div>

    <!-- /.row -->
    <div class="row" style="padding-left: 1%!important;">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                 <a href="{{ route('ajout_produits') }}"> <button type="submit" data-toggle="modal" data-target="#" class="btn btn-info btn-block btn-flat"  style="background-color: #170d7b;"><i class="fa fa-plus-circle text-white"></i> Ajouter un produit</button> </a>
                </h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm mt-2" style="width: 250px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Recherche..." wire:model="search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>titre</th>
                      <th>type</th>
                      <th>taille</th>
                      <th>prix</th>
                      <th>couleur</th>

                      <th>Stock</th>
                      <th>etat</th>
                      <th>DJASSA</th>
                      <th>Date d'ajout</th>
                      <th>Infos</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($product as $products)
                    <tr>
                      <td>{{$products->id}}</td>
                      <td>
                          <div >
                             {{Illuminate\Support\Str::limit($products->libelle , 10, '...')}}
                          </div>
                        </td>
                      <td>{{$products->type}}</td>
                      @if(!is_null($products->taille))
                      <td>
                        @foreach($products->taille as $tailles)
                          {{$tailles}},
                        @endforeach
                      </td>
                      @else
                      <td>Taille non specifier</td>
                      @endif
                      <td>{{$products->prix}} FCFA</td>
                      <td>
                        @if(!is_null($products->couleur))
                        <select class="form-control" style="width: 100px;">
                        @foreach($products->couleur as $couleurs)
                          <option>{{$couleurs}}</option>
                        @endforeach
                        </select>
                         @else
                        <h6 class='text-warning'>Aucune couleurs </h6>
                        @endif
                      </td>

                      <td>{{$products->qte_stock}}</td>
                      <td>
                         @if($products->etat == 0)
                         <span class="bg-danger rounded-pill p-1">  desactiver</span>
                                @else
                                <span class="rounded-pill px-2 py-1" style="background-color: #7bd0b2; opacity: 0.8;">Activer  </span>
                                @endif

                      </td>
                      <td>
                         <a class="btn btn-primary btn-sm" wire:click="ToggleIsDjassa({{$products->id}})" data-toggle="modal" data-target="#" style="background-color: #170d7b; "> @if($products->is_djassa == 1)<i class="fas fa-check p-1"></i> @else <i class="fas fa-recycle p-1"></i> @endif </a>
                      </td>
                      <td>{{date('j M, Y', strtotime($products->created_at))}}</td>
                      <td>
                         <a class="btn btn-success btn-sm" wire:click="InfoProduit({{$products->id}})" data-toggle="modal" data-target="#InfosProduit"> <i class="fas fa-eye mr-1"></i> Afficher</a>
                      </td>
                     <td>
                     <div class="timeline-footer">
                          <a class="btn btn-warning btn-sm" wire:click="editProduit({{$products->id}})"  data-toggle="modal" data-target="#editProduit"> <i class="fas fa-edit mr-1"></i> Modifier</a>
                          <a class="btn btn-danger btn-sm ml-2" wire:click="deleteProduit({{$products->id}})" > <i class="fas fa-trash mr-1"></i> supprimer</a>
                        </div>
                     </td>
                    </tr>
                    @endforeach
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->

              <div class="card-footer clearfix">
                @if( App\Models\Produit::count() > $product->count() )
                <div class="row mt-8 mx-auto">
                    <div class="col">
                        <div class="text-center mt-1">
                        <p wire:loading>Chargement en cour... </p>
                            <button wire:click="loadMore" type="button" class="btn btn-primary">afficher plus <i class="fas fa-refresh"></i></button>
                        </div>
                    </div>
                </div>
         @endif
              </div>
            </div>
            <!-- /.card -->
          </div>
    </div>



      <div wire:ignore.self class="modal fade" id="editProduit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- <div class="overlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div> -->
            <div class="modal-header bg-info">
              <h4 class="modal-title">Modifier {{$libelle}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                        <!-- /.card-header -->
                    <div class="card-body" style="padding: 0px!important;">
                      <form wire:submit.prevent="changeProduit">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                 <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Libelle</label>
                                    <input type="text" wire:model.lazy="libelle"  class="form-control"  placeholder="Nom du produit...">
                                  </div>

                                   <div class="form-group" Style="margin-bottom: 0px!important;">
                                         <label class="col-form-label"> type</label>
                                            <select  class="custom-select" wire:model.lazy="type">
                                                <option value="Hommes">Hommes</option>
                                                <option value="Femmes">Femmes</option>
                                                <option value="Enfants">Enfants</option>
                                                <option value="Tous genres">Tous genres</option>
                                                <option value="Accessoire">Accessoires</option>
                                            </select>
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Pointure (FACULTATIF)</label>
                                    <input type="text" wire:model.lazy="pointure"  class="form-control"  placeholder="Ex:32-33-25-45...">
                                  </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">

                                    <div class="form-group" Style="margin-bottom: 0px!important;">
                                         <label class="col-form-label">Categories</label>
                                            <select  class="custom-select" wire:model.lazy="selectSousCat">
                                              @foreach($souscat as $souscats)
                                                <option value="{{$souscats->id}}">{{$souscats->libelle}}</option>
                                                @endforeach
                                            </select>
                                  </div>


                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                    <label class="col-form-label"> Stock</label>
                                    <input type="text" wire:model.lazy="qte_stock" class="form-control "  placeholder="Quantite ...">
                                  </div>


                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                      <label class="col-form-label">Prix</label>
                                      <div class="input-group">
                                        <input type="text" wire:model.lazy="prix" class="form-control " placeholder="Ex=15 000">
                                      </div>
                                      <!-- /.input group -->
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                      <label class="col-form-label">PHoto principale</label>
                                      <div class="input-group">
                                        <input type="file" wire:model.debounce.50ms="AsPhotoPrincip">
                                      </div>
                                      <!-- /.input group -->
                                  </div>


                             </div>
                        <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group" Style="margin-bottom: 0px!important;">
                                         <label class="col-form-label">Descriptions</label>
                                        <textarea id="summernote" >
                                            Place <em>some</em> <u>text</u> <strong>here</strong>
                                        </textarea>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- /.card-body -->




            </div>
                    <div class="modal-footer justify-content-between">
                                  <button type="button"  class="btn btn-danger" >Fermer</button>
                                  <button type="submit" class="btn btn-warning">Modifier</button>
                                </div>
          </div>
          </form>

          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      @include('Backend/pages/produit/modalInfo')



      <div wire:ignore.self class="modal fade" id="ViewImgProduct">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- <div class="overlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div> -->
            <!-- <div class="modal-header bg-info">
              <h4 class="modal-title">View Images</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div> -->
            <div class="modal-body">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>


                <section class="content">

                    <!-- Default box -->
                    <div class="card card-solid">
                    <div class="card-body" style="padding: 2px!important;">
                        <img src="../Backend/images/Produit/{{$path_img_view}}" alt="none" style="width: 100%;">
                    </div>
                  </div>

              </section>


            </div>

          </div>

          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <div wire:ignore.self class="modal fade" id="ajoutPromo">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- <div class="overlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div> -->
            <div class="modal-header " style="background-color: #170d7b;">
              <h4 class="modal-title text-white" >Promotion </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                        <!-- /.card-header -->
                    <div class="card-body" style="padding: 0px!important;">
                      <form wire:submit.prevent="addPromotionProduct">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                 <div class="form-group @error('promo_date_debut') is-invalid @enderror" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Date de Debut</label>
                                    <input type="date" wire:model.lazy="promo_date_debut"  class="form-control @error('promo_date_debut') is-invalid @enderror"  placeholder="Ex:dd/mm/yyyy">
                                  </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-4">
                                  <div class="form-group @error('promo_nb_jours') is-invalid @enderror" Style="margin-bottom: 0px!important;">
                                      <label class="col-form-label">Nombres de jours</label>
                                      <div class="input-group">
                                        <input type="number" wire:model.lazy="promo_nb_jours" class="form-control @error('promo_nb_jours') is-invalid @enderror" placeholder="Ex= 3 ">
                                      </div>
                                      <!-- /.input group -->
                                  </div>
                             </div>

                             <div class="col-12 col-sm-4">
                                  <div class="form-group @error('promo_pourcentage') is-invalid @enderror" Style="margin-bottom: 0px!important;">
                                      <label class="col-form-label"> Pourcentage </label>
                                      <input type="number" wire:model.lazy="promo_pourcentage" class="form-control @error('promo_pourcentage') is-invalid @enderror"  placeholder="Ex: 10%">
                                  </div>
                              </div>
                        <!-- /.col -->
                        </div>
                        <!-- /.row -->


                    </div>
                    <!-- /.card-body -->




            </div>
                    <div class="modal-footer justify-content-between">
                                  <button type="button"  class="btn btn-danger" >Fermer</button>
                                  <button type="submit" class="btn btn-warning">Enregistrer</button>
                                </div>
          </div>
          </form>

          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

</div>
