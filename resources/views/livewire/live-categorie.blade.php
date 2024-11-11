<div>


<div class="row">
    <div class="col-lg-3 col-sm-6 col-xs-6">
             <button type="reset" class="btn col ml-3" style="background-color: #0c0554;" data-toggle="modal" data-target="#addCategorie">
                        <i style="color: #fff;" class="fas fa-plus-circle"></i>
                        <span style="color: #fff;">Ajouter une Categorie</span>
                      </button>
    </div>
</div>

<!-- /.row -->
<div class="row" style="padding: 1%!important;">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Listes exaustives des categories </h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" wire:model="search" placeholder="recherche">

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
                      <th>Libelle</th>
                      <th>Sous-Categories (Produits)</th>
                      <th>Meilleurs Categorie</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categorie as $categories)
                    <tr>
                      <td>{{$categories->id}}</td>
                      <td>{{$categories->libelle}}</td>
                      <td>
                      @if($categories->souscategorie()->count() > 0)
                         <select class="custom-select">
                          @foreach($categories->souscategorie as $subcategory)
                          <option>{{$subcategory->libelle}} <span class="bg-success">( {{$subcategory->produit()->count()}} produits)</span></option>
                          @endforeach
                        </select>
                        @else
                          <span class="text-warning">Aucune sous categorie</span>
                        @endif
                      </td>
                      
                      <td>
                        @if($categories->is_best == 0)
                      <a class="btn btn-success btn-sm ml-3" wire:click="active_the_best_categorie({{$categories->id}})"><i class="fas fa-check mr-1"></i> activer</a>
                      @else
                      <a class="btn btn-danger btn-sm ml-3" wire:click="active_the_best_categorie({{$categories->id}})"><i class="fas fa-recycle mr-1"></i> Deésactiver</a>
                      @endif
                      </td>
                      <td>
                        <div class="timeline-footer">
                          <a class="btn btn-primary btn-sm" wire:click="editCategorie({{ $categories->id }})" data-toggle="modal" data-target="#editCategorie"> <i class="fas fa-edit mr-1"></i> Modifier</a>
                          <a class="btn btn-danger btn-sm ml-2" wire:click="deleteCategorie({{ $categories->id  }})"> <i class="fas fa-trash mr-1"></i> supprimer</a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>




      <!-- Mon modal -->


      <div wire:ignore.self class="modal fade" id="addCategorie">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div wire:loading>
                <div class="overlay">
                    <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
            </div>
            <div class="modal-header bg-info">
              <h4 class="modal-title">Ajouter une Categorie</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form wire:submit.prevent="create_categorie">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Text</label>
                        <input type="text" wire:model.debounce.150ms="libelle" class="form-control @error('libelle') is-invalid @enderror is-valid"  placeholder="Enter ...">
                      </div>
                      @error('libelle') <span class="error invalid-feedback">{{$message}}</span> @enderror
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Banniere taille(xxx px / xxx px)</label>
                        <input type="file" wire:model.debounce.50ms="AsBanner"  class="form-control" placeholder="Ajouter une Banniere ..." >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description (FACULTATIF)</label>
                        <textarea class="form-control" wire:model.lazy="description" rows="3" placeholder="Entrer une description..."></textarea>
                      </div>
                    </div>
                  </div>

                  @if($AsBanner)
                  <div style="width: 98%!important; height: 20%;">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <img src="{{ $AsBanner->temporaryUrl() }}" alt="" style="width: 100%!important; height: 20%;">
                      </div>
                    </div>
                  </div>
                  </div>

                @endif


                @if($ToggleAddlogo)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>taille de l'image (130 px / 130 px)</label>
                                <input type="file" wire:model.debounce.50ms="asLogo"  class="form-control" placeholder="Ajouter une image ..." >
                            </div>
                        </div>
                    </div>
                @endif


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              @if($ToggleAddlogo)
                <button type="button" class="btn btn-danger" wire:click="changeToggleAddlogo">retirer</button>
                @else
                <button type="button" class="btn btn-primary" wire:click="changeToggleAddlogo">Ajouter un logo</button>
                @endif
              <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <!-- Modal de Modification -->
      <div wire:ignore.self class="modal fade" id="editCategorie">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
           <div wire:loading>
                <div class="overlay">
                    <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
            </div>
            <div class="modal-header bg-warning">
              <h4 class="modal-title">Modifier la Categorie {{$libelle}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form wire:submit.prevent="updateCategorie">
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
                        <label>Banniere taille(xxx px / xxx px)</label>
                        <input type="file" wire:model.debounce.50ms="AsBanner"  class="form-control" placeholder="Ajouter une Banniere ..." >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" wire:model.lazy="description" rows="3" placeholder="Entrer une description..."></textarea>
                      </div>
                    </div>
                  </div>

                  @if($AsBanner)
                  <div style="width: 98%!important; height: 20%;">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <img src="{{ $AsBanner->temporaryUrl() }}" alt=""style="width: 100%!important; height: 20%;">
                      </div>
                    </div>
                  </div>
                  </div>
                @endif

                @if($ToggleAddlogo)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <label>taille de l'image (130 px / 130 px)</label>
                            <input type="file" wire:model.debounce.50ms="asLogo"  class="form-control" placeholder="Ajouter une image ..." >
                        </div>
                    </div>
                 </div>
                @endif


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              @if($ToggleAddlogo)
                <button type="button" class="btn btn-danger" wire:click="changeToggleAddlogo">retirer</button>
                @else
                <button type="button" class="btn btn-primary" wire:click="changeToggleAddlogo">Modifier un logo</button>
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


</div>
