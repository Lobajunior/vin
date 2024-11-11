<div>
    


    <div wire:ignore.self class="modal fade" id="listBlogCategorie">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Categories de Blog</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#addBlogCategorie">
                <i class="fas fa-pencil-alt"></i>Ajouter</a>

            <div class="card mt-3 ">
                 <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Noms</th>
                      <th>Nombre de blogs</th>
                      <th >Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($blogCat->count() <= 0)
                    <tr>
                    <td>
                    <p class='text-warning'> Aucune Categorie enregistrer</p>
                    </td>
                   </tr>
                   
                   @else
                   @foreach($blogCat as $itemblogCat)
                    <tr>
                      <td>{{$itemblogCat->libelle}}</td>
                      <td>
                      
                      </td>
                      <td class="project-actions text-right">
                         
                          <a class="btn btn-info btn-sm" wire:click='editCat({{$itemblogCat->id}})' data-toggle="modal" data-target="#editBlogCategorie" >
                              <i class="fas fa-pencil-alt">
                              </i>
                              modifier
                          </a>
                          <a class="btn btn-danger btn-sm" wire:click='deleteCat({{$itemblogCat->id}})'>
                              <i class="fas fa-trash">
                              </i>
                              suprimer
                          </a>
                      </td>
                    </tr>
                   @endforeach
                   @endif
                  </tbody>
                </table>
              </div>
              
            </div>

            </div>
         
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    <div wire:ignore.self class="modal fade" id="addBlogCategorie">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-peimary">
              <h4 class="modal-title">Ajouter une Categorie</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


                <form wire:submit.prevent='create_categorieBlog'>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Nom</label>
                        <input type="text" wire:model.lazy="libelle" class="form-control @error('libelle') is-invalid @enderror is-valid"  placeholder="Entrer ...">
                      </div>
                      @error('libelle') <span class="error invalid-feedback">{{$message}}</span> @enderror
                    </div>
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>




    <div wire:ignore.self class="modal fade" id="editBlogCategorie">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header bg-peimary">
              <h4 class="modal-title">Modifier une Categorie</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


                <form wire:submit.prevent='updateCat'>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Nom</label>
                        <input type="text" wire:model.lazy="libelle" class="form-control @error('libelle') is-invalid @enderror is-valid"  placeholder="Entrer ...">
                      </div>
                      @error('libelle') <span class="error invalid-feedback">{{$message}}</span> @enderror
                    </div>
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-warning">Sauvegarder</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    
</div>
