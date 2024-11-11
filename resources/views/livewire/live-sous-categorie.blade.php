<div>



<div class="row">
    <div class="container">
    <div class="col-lg-4 col-sm-6 col-xs-6 col-md-5 mb-1">

    </div>
    </div>
</div>

<!-- /.row -->
<div class="row" style="padding: 1%!important;">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Listes des Sous categories </h3>

                <div class="card-tools">
                  <button type="reset" class="btn btn-info col ml-1" style="margin-left: 0px!important;" data-toggle="modal" data-target="#addSousCategorie">
                      <i class="fas fa-plus-circle"></i>
                      <span>Ajouter une SousCategorie</span>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th>Categories</th>
                      <th>Images</th>
                      <th>Sous-categorie</th>
                      <th>Infos</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  @foreach($the_category as $the_categorys)
                  @if($the_categorys->souscategorie()->count() > 0)
                  <tbody>
                          <tr>
                            <td rowspan="{{$the_categorys->souscategorie()->count() + 1}}" >
                              <span class="text-lowercase" style="color: black; font-weight: 700;">{{$the_categorys->libelle}} </span>
                            </td>
                          </tr>
                    @foreach($the_categorys->souscategorie as $subCategories)
                    <tr>
                      <td>
                        @if(!is_null($subCategories->photo) && $subCategories->photo != "defaultSubCategory.jpg")
                        <img class="direct-chat-img"  style="border-radius: 0px!important; width:80px!important;" src="../Backend/images/SousCategorie/{{$subCategories->photo}}" alt="User">
                        @else
                            <img class="direct-chat-img" style="border-radius: 0px!important; width:80px!important;" src="../Backend/dist/img/default-150x150.png" alt="User">
                        @endif
                    </td>
                      <td>
                        {{$subCategories->libelle}}
                      </td>
                      <td>
                        <a class="btn btn-info btn-sm" wire:click="checkProductAtSousVategorie( {{$subCategories->id}} )"  data-toggle="modal" data-target="#checkSubCategorie"> <i class="fas fa-eye mr-1"></i> voir</a>
                      </td>
                      <td>
                        <div class="timeline-footer">
                          <a class="btn btn-primary btn-sm" wire:click="edit_sousCategorie({{$subCategories->id}})" data-toggle="modal" data-target="#EditSousCategorie"> <i class="fas fa-edit mr-1"></i> Modifier</a>
                          <a class="btn btn-danger btn-sm ml-2" wire:click="deleteSousCategorie({{$subCategories->id}})"> <i class="fas fa-trash mr-1"></i> supprimer</a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  @endif
                    @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>





        <!-- modal d'ajout de sous categorie-->

        <div wire:ignore.self class="modal fade" id="addSousCategorie">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div wire:loading wire:target="ASphoto">
                    <div class="overlay" >
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                  </div>
                    <div class="modal-header bg-success">
                    <h4 class="modal-title">Ajouter une Sous Categorie</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        @if(isset($categories) && $categories->count() > 0)

                        <form wire:submit.prevent="create_SousCategorie">
                        <div class="row">
                            <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Text</label>
                                <input type="text" wire:model.lazy="libelle" class="form-control @error('libelle') is-invalid @enderror is-valid"  placeholder="Enter ...">
                            </div>
                            @error('libelle') <span class="error invalid-feedback">{{$message}}</span> @enderror
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label>Categorie</label>
                                    <select class="form-control @error('selectCategorie') is-invalid @enderror" wire:model.lazy="selectCategorie">
                                        <option> categories</option>
                                        @foreach($categories as $categoriess)
                                        <option value="{{$categoriess->id}}">{{$categoriess->libelle}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            @error('selectCategorie') <span class="error invalid-feedback">{{$message}}</span> @enderror
                            </div>
                        </div>

                        @if($ToggleAjoutPhoto)
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>taille de l'image (1000 px / 440 px)</label>
                                        <input type="file" wire:model.debounce.50ms="ASphoto"  class="form-control" placeholder="Ajouter une image ..." >
                                    </div>
                                </div>
                                @if($ASphoto)
                                <div class="col-sm-6" style="width: 98%!important; height: 20%;">
                                    <div class="form-group">
                                            <div style="width: 98%!important; height: 20%;">
                                              <div class="row">
                                                  <div class="col-sm-12">
                                                  <!-- textarea -->
                                                  <div class="form-group">
                                                      <img src="{{ $ASphoto->temporaryUrl() }}" alt="" style="width: 100%!important;">
                                                  </div>
                                                  </div>
                                              </div>
                                            </div>
                                    </div>
                                </div>
                                @endif
                        </div>
                        @endif




                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    @if($ToggleAjoutPhoto)
                    <button type="button" class="btn btn-danger" wire:click="changeToggleAjoutPhoto">retirer</button>
                    @else
                    <button type="button" class="btn btn-primary" wire:click="changeToggleAjoutPhoto">Ajouter une image</button>
                    @endif
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                    @else
                        <h5 class="text-warning">Veuillez ajouter des Categories avant d'ajouter une sous Categorie</h5>
                    @endif
                </form>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
        </div>
      <!-- /.modal -->



      <!-- modal d'ajout de sous categorie-->

        <div wire:ignore.self class="modal fade" id="EditSousCategorie">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                    <h4 class="modal-title">Modifier {{$libelle}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">

                        <form wire:submit.prevent="modifySousCategorie">
                        <div class="row">
                            <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Text</label>
                                <input type="text" wire:model.lazy="libelle" class="form-control @error('libelle') is-invalid @enderror is-valid"  placeholder="Enter ...">
                            </div>
                            @error('libelle') <span class="error invalid-feedback">{{$message}}</span> @enderror
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                                <label>Categorie</label>
                                    <select class="form-control @error('selectCategorie') is-invalid @enderror" wire:model.lazy="selectCategorie">
                                        <option> categories</option>
                                        @foreach($categories as $categoriess)
                                        <option value="{{$categoriess->id}}">{{$categoriess->libelle}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            @error('selectCategorie') <span class="error invalid-feedback">{{$message}}</span> @enderror
                            </div>
                        </div>

                        @if($ToggleAjoutPhoto)
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>taille de l'image (1000 px / 440 px)</label>
                                        <input type="file" wire:model.debounce.50ms="ASphoto"  class="form-control" placeholder="Ajouter une image ..." >
                                    </div>
                                </div>
                                @if($ASphoto)
                                <div class="col-sm-6" style="width: 98%!important; height: 20%;">
                                    <div class="form-group"> 
                                            <div style="width: 98%!important; height: 20%;">
                                              <div class="row">
                                                  <div class="col-sm-12">
                                                  <!-- textarea -->
                                                  <div class="form-group">
                                                      <img src="{{ $ASphoto->temporaryUrl() }}" alt="" style="width: 100%!important;">
                                                  </div>
                                                  </div>
                                              </div>
                                            </div>              
                                    </div>
                                </div>
                                @endif
                        </div>
                        @endif

                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    @if($ToggleAjoutPhoto)
                    <button type="button" class="btn btn-danger" wire:click="changeToggleAjoutPhoto">retirer</button>
                    @else
                    <button type="button" class="btn btn-primary" wire:click="changeToggleAjoutPhoto">Ajouter une image</button>
                    @endif
                    <button type="submit" class="btn btn-warning">Modifier</button>
                    </div>
                </form>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
        </div>
      <!-- /.modal -->




      <div wire:ignore.self class="modal fade" id="checkSubCategorie">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Infos {{$libelle}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                        <div class="row">
                            <!-- /.col -->
                                <div class="col-md-8 mx-auto">
                                    <!-- Widget: user widget style 1 -->
                                    <div class="card card-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    
                                    <div class="widget-user-header text-white"
                                        style="background: @if($ASphoto) url('{{ $ASphoto->temporaryUrl() }}') @else url('../Backend/images/SousCategorie/{{$ASphotomodif}}') @endif no-repeat center center; background-size:cover;">
                                        <h5 class="widget-user-desc text-right">{{$libelle}}</h5>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                            <h5 class="description-header">32 %</h5>
                                            <span class="description-text">commandes</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                          @if(!is_null($productAtSouscat))
                                            <h5 class="description-header">{{$productAtSouscat->count()}}</h5>
                                            @endif
                                            <span class="description-text">PRODUITS</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                              <form wire:submit.prevent="modifyImg">
                                              <input type="file" wire:model.debounce.50ms="ASphoto"  class="form-control mb-1" placeholder="Ajouter une image ..." >
                                                <button type="submit" class="btn btn-primary">modifier l'image</button>
                                              </form>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    </div>
                                    <!-- /.widget-user -->
                                </div>
                                <!-- /.col -->
                        </div>


                        <div class="row">
                        <div class="card-body table-responsive p-0">
                                <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Noms</th>
                                    <th>Prix</th>
                                    <th>type</th>
                                    <th>tailles</th>
                                    <th>pointures</th>

                                    </tr>
                                </thead>
                                <tbody>
                                  @if(!is_null($productAtSouscat))
                                  @foreach($productAtSouscat as $productAtSouscats)
                                    <tr>
                                      <td>{{$productAtSouscats->id}}</td>
                                      <td>{{$productAtSouscats->libelle}}</td>
                                      <td>
                                      {{$productAtSouscats->prix}} FCFA
                                      </td>
                                      <td>
                                      {{$productAtSouscats->type}}
                                      </td>
                                      @if(!is_null($productAtSouscats->taille))
                                      @foreach($productAtSouscats->taille as $tailles)
                                      <td>
                                        {{$tailles}}
                                      </td>
                                      @endforeach
                                      @else
                                        <td class="text-info">
                                          Aucune taille specifier
                                        </td>
                                      @endif
                                    @if(!is_null($productAtSouscats->pointure))
                                      <td> {{$productAtSouscats->pointure}}</td>
                                      @else
                                      <td class="text-warning">
                                        Aucune pointure pour ce produit
                                      </td>
                                    @endif
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                </table>
                            </div>
                        </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


</div>
