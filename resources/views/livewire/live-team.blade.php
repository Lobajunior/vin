<div>


    <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            @foreach($user_member as $user_members)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                @if(!is_null($user_members->profession))
                  {{$user_members->profession}}
                  @else
                  Aucune profession
                  @endif
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$user_members->prenom}} {{$user_members->nom}}</b></h2>
                      <p class="text-muted text-sm"><b>A propos: </b>  @if(!is_null($user_members->profession))
                  {{$user_members->profession}}
                  @else
                  Aucune profession
                  @endif </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Addresse: {{$user_members->ville}} {{$user_members->adresse}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$user_members->phone}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{URL::asset('../Backend/images/User/'.$user_members->photo) }}" alt="user" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-plus"></i>  membre
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @foreach($membre as $membres)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                @if(!is_null($membres->profession))
                  {{$membres->profession}}
                  @else
                  Aucune profession
                  @endif
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$membres->prenom}} {{$membres->nom}}</b></h2>
                      <p class="text-muted text-sm"><b>A propos: </b>  @if(!is_null($membres->profession))
                  {{$membres->profession}}
                  @else
                  Aucune profession
                  @endif </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Addresse: {{$membres->ville}} {{$membres->adresse}}</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$membres->phone}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{URL::asset('../Backend/images/Team/'.$membres->photo) }}" alt="user" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                      <div class="btn-group ">
                        <button type="button" class="btn btn-default">Action</button>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu " role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-5px, 38px, 0px);">
                          <a class="dropdown-item" href="#" wire:click="createUser_atTeam({{$membres->id}})">Ajouter aux utilisateurs</a>
                            <a class="dropdown-item" href="#" wire:click="edit_Team({{$membres->id}})" data-toggle="modal" data-target="#editTeam">Modifier</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#" wire:click="deleteTeam({{$membres->id}})">Suprimer</a>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
      


      <div wire:ignore.self class="modal fade" id="addTeam">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- <div class="overlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div> -->
            <div class="modal-header bg-info">
              <h4 class="modal-title">Enregistrer un Nouveau membre</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                        <!-- /.card-header -->
                    <div class="card-body" style="padding: 0px!important;">
                      <form wire:submit.prevent="create_Team">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                 <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Nom</label>
                                    <input type="text" wire:model.lazy="nom"  class="form-control @error('nom') is-invalid @enderror"  placeholder="Nom...">
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Email </label>
                                    <input type="email" wire:model.lazy="email"  class="form-control @error('email') is-invalid @enderror"  placeholder="Ex:123893@gmail.com...">
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Ville </label>
                                    <input type="text" wire:model.lazy="ville"  class="form-control @error('ville') is-invalid @enderror"  placeholder="Entrer une  ville .">
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Joindre une photo de profile </label>
                                    <input type="file" wire:model.lazy="Aspp"  class="form-control"  placeholder="Saisir a profession...">
                                  </div>
                                    
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                    <label class="col-form-label"> Prenoms</label>
                                    <input type="text" wire:model.lazy="prenom" class="form-control  @error('prenom') is-invalid @enderror"  placeholder="Entrer un/des prenoms ...">
                                  </div>


                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                      <label class="col-form-label">Contacts</label>
                                      <div class="input-group">
                                        <input type="text" wire:model.lazy="contact" class="form-control  @error('contact') is-invalid @enderror" placeholder="Ex=+225 0707070707">
                                      </div>
                                      <!-- /.input group -->
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Adresse </label>
                                    <input type="text" wire:model.lazy="adresse"  class="form-control @error('adresse') is-invalid @enderror"  placeholder="Entrer une adresse...">
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Profession </label>
                                    <input type="text" wire:model.lazy="profession"  class="form-control @error('profession') is-invalid @enderror"  placeholder="Saisir la profession...">
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
                                  <button type="submit" class="btn btn-info">Enregistrer</button>
                                </div>
          </div>
          </form>

          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->






      <div wire:ignore.self class="modal fade" id="editTeam">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- <div class="overlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div> -->
            <div class="modal-header bg-warning">
              <h4 class="modal-title">Modifier {{$prenom}} {{$nom}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                        <!-- /.card-header -->
                    <div class="card-body" style="padding: 0px!important;">
                      <form wire:submit.prevent="changeTeam">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                 <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Nom</label>
                                    <input type="text" wire:model.lazy="nom"  class="form-control @error('nom') is-invalid @enderror"  placeholder="Nom...">
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Email </label>
                                    <input type="email" wire:model.lazy="email"  class="form-control @error('email') is-invalid @enderror"  placeholder="Ex:123893@gmail.com...">
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Ville </label>
                                    <input type="text" wire:model.lazy="ville"  class="form-control @error('ville') is-invalid @enderror"  placeholder="Entrer une  ville .">
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Joindre une photo de profile </label>
                                    <input type="file" wire:model.lazy="Aspp"  class="form-control"  placeholder="Saisir a profession...">
                                  </div>
                                    
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                    <label class="col-form-label"> Prenoms</label>
                                    <input type="text" wire:model.lazy="prenom" class="form-control  @error('prenom') is-invalid @enderror"  placeholder="Entrer un/des prenoms ...">
                                  </div>


                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                      <label class="col-form-label">Contacts</label>
                                      <div class="input-group">
                                        <input type="text" wire:model.lazy="contact" class="form-control  @error('contact') is-invalid @enderror" placeholder="Ex=+225 0707070707">
                                      </div>
                                      <!-- /.input group -->
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Adresse </label>
                                    <input type="text" wire:model.lazy="adresse"  class="form-control @error('adresse') is-invalid @enderror"  placeholder="Entrer une adresse...">
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Profession </label>
                                    <input type="text" wire:model.lazy="profession"  class="form-control @error('profession') is-invalid @enderror"  placeholder="Saisir la profession...">
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
                                  <button type="submit" class="btn btn-warning">Modifier</button>
                                </div>
          </div>
          </form>

          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

</div>
