<div>

        <div class="row" style="padding: 1%!important;">
          <div class="col-md-12">
          @if($partners->count() > 0)

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 20px!important" >photo</th>
                      <th>Nom</th>
                      <th>email</th>
                      <th>Contact</th>
                      <th >Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($partners as $partnerss)
                    <tr>
                      <td>{{$partnerss->id}}</td>
                      <td>
                        @if(!is_null($partnerss->logo))
                            <img src="{{URL::asset('../Backend/images/Partenaire/'.$partnerss->logo) }}" alt="" style="width:100%!important; height:20%!important;margin:auto;">
                        @endif
                      </td>
                      <td>{{$partnerss->nom}}</td>
                      <td>
                      @if(!is_null($partnerss->email))
                        {{$partnerss->email}}
                        @else
                        Aucuun email
                        @endif
                    </td>
                      <td>
                      @if(!is_null($partnerss->contact))
                        {{$partnerss->contact}}
                        @else
                        Aucuun Contact
                        @endif
                      </td>
                      <td>
                        <a class="btn btn-primary btn-sm" wire:click="editPartenaire({{$partnerss->id}})"  data-toggle="modal" data-target="#EditPartner"> <i class="fas fa-edit mr-1"></i> Modifier</a>
                    <a class="btn btn-danger btn-sm ml-2" wire:click="deletePartenaire({{$partnerss->id}})"> <i class="fas fa-trash mr-1"></i> supprimer</a>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
            @else
            <div class="alert alert-info alert-dismissible">
                  <h5><i class="icon fas fa-info"></i> Alert!</h5>
                  Aucun partenaire enregistrer pour le moment, veuillez cliquez sur le boutton <i class="fas fa-plus-circle"> </i> pour enregistrer un partenaire !
                </div>
          @endif

          </div>
        </div>



      <!-- modal d'ajout de sous categorie-->

        <div wire:ignore.self class="modal fade" id="addPartenaire">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                    <h4 class="modal-title">Enregistrer un Partenaire</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">

                        <form wire:submit.prevent="create_partenaire">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" wire:model.lazy="nom" class="form-control @error('nom') is-invalid @enderror is-valid"  placeholder="Enter ...">
                                </div>
                                @error('nom') <span class="error invalid-feedback">{{$message}}</span> @enderror

                                <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" wire:model.lazy="email" class="form-control @error('email') is-invalid @enderror "  placeholder="Enter ...">
                                    </div>      
                                </div>

                            <div class="col-sm-6">
                                        <!-- text input -->
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" wire:model.lazy="contact" class="form-control @error('contact') is-invalid @enderror "  placeholder="Enter ...">
                                </div>
                                   
                                    @if($ToggleAjoutLogo)
                                    <div class="form-group">
                                        <label>taille du logo (1000 px / 440 px)</label>
                                        <input type="file" wire:model.debounce.50ms="ASlogo"  class="form-control" placeholder="Ajouter une image ..." >
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if($ASlogo)

                        <div class="row" style="width: 100%!important; height: 20%;">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                            <div style="width: 98%!important; height: 20%;">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <img src="{{ $ASlogo->temporaryUrl() }}" alt="" style="width: 100%!important;" >
                                                </div>
                                                </div>
                                            </div>
                                            </div>

                                    </div>
                                </div>
                        </div>
                        @endif
                        


                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    @if($ToggleAjoutLogo)
                    <button type="button" class="btn btn-danger" wire:click="changeToggleAjoutLogo">retirer</button>
                    @else
                    <button type="button" class="btn btn-primary" wire:click="changeToggleAjoutLogo">Ajouter une image</button>
                    @endif
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </form>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
        </div>
      <!-- /.modal -->


        <div wire:ignore.self class="modal fade" id="EditPartner">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                    <h4 class="modal-title">Modifier  {{$nom}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">

                        <form wire:submit.prevent="changePartenaire">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" wire:model.lazy="nom" class="form-control @error('nom') is-invalid @enderror is-valid"  placeholder="Enter ...">
                                </div>
                                @error('nom') <span class="error invalid-feedback">{{$message}}</span> @enderror

                                <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" wire:model.lazy="email" class="form-control @error('email') is-invalid @enderror "  placeholder="Enter ...">
                                    </div>
                                
                            </div>


                            <div class="col-sm-6">
                                        <!-- text input -->
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" wire:model.lazy="contact" class="form-control @error('contact') is-invalid @enderror "  placeholder="Enter ...">
                                </div>
                                   
                                    @if($ToggleAjoutLogo)
                                    <div class="form-group">
                                        <label>Taille du logo (100 px / 33 px)</label>
                                        <input type="file" wire:model.debounce.50ms="ASlogo"  class="form-control" placeholder="Ajouter une image ..." >
                                    </div>
                                @endif

                            </div>
                        </div>
                        @if($ASlogo)

                        <div class="row"  style="width: 100%!important; height: 20%;">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                            <div style="width: 98%!important; height: 20%;">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <img src="{{ $ASlogo->temporaryUrl() }}" alt=""  style="width: 100%!important;">
                                                </div>
                                                </div>
                                            </div>
                                            </div>

                                    </div>
                                </div>
                        </div>
                        @endif
                        


                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    @if($ToggleAjoutLogo)
                    <button type="button" class="btn btn-danger" wire:click="changeToggleAjoutLogo">retirer</button>
                    @else
                    <button type="button" class="btn btn-primary" wire:click="changeToggleAjoutLogo">Ajouter une image</button>
                    @endif
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>
                </form>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
        </div>
      <!-- /.modal -->


</div>
