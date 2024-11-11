<div>




    <div class="row" style="padding: 1%!important;">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <button type="reset" class="btn btn-primary col ml-3" style="margin-left: 0px!important;" data-toggle="modal" data-target="#addUtilisateur">
                        <i class="fas fa-plus-circle"></i>
                        <span>Ajouter un utilisateur</span>
                    </button>
                </h3>

                <div class="card-tools mt-2">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="recherche" wire:model="search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 400px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Email</th>
                      <th>ville</th>
                      <th>Contacts</th>
                      <th>Membre</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($utilisateur as $utilisateurss)
                    <tr>
                      <td>{{$utilisateurss->id}}</td>
                      <td>{{$utilisateurss->nom}} {{ $utilisateurss->prenom}}</td>
                      <td>{{$utilisateurss->created_at->diffForHumans()}}</td>
                      <td>
                        @if( $utilisateurss->role == "SuperAdmin")
                        <span class="badge bg-success">Admin</span>
                        @else
                        <span class="badge bg-danger">user</span>
                        @endif
                      </td>
                      <td>{{ $utilisateurss->email}}</td>
                      <td>{{ $utilisateurss->villes}}</td>

                      <td>{{ $utilisateurss->phone}}</td>
                      <td>
                        @if($utilisateurss->is_member == 0)<a wire:click="memberUser({{$utilisateurss->id}})"> <i class="fas fa-plus-circle text-info mr-1"></i> </a>@else <i class="fas fa-heart text-success mr-1"></i> @endif
                      </td>
                      <td>
                      <div class="timeline-footer">
                          <a class="btn btn-success btn-sm"  wire:click="checkUtilisateur({{$utilisateurss->id}})" data-toggle="modal" data-target="#checkUser"> <i class="fas fa-eye mr-1"></i></a>
                          <a class="btn btn-primary btn-sm" wire:click="editUser({{$utilisateurss->id}})"  data-toggle="modal" data-target="#UserEdit"> <i class="fas fa-edit mr-1"></i> </a>
                          <a class="btn btn-danger btn-sm ml-2" wire:click="deleteUser({{$utilisateurss->id}})"> <i class="fas fa-trash mr-1"></i> </a>
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






      <div  wire:ignore.self class="modal fade" id="addUtilisateur">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- <div class="overlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div> -->
            <div class="modal-header">
              <h4 class="modal-title">{{ $pages[$currentPage]['header'] }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">



                        <!-- /.card-header -->
                    <div class="card-body" style="padding: 0px!important;">
                    <form wire:submit.prevent="createUser">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                          @if($currentPage == 1)
                                 <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Noms</label>
                                    <input type="text" wire:model.lazy="nom" class="form-control @error('nom') is-invalid @enderror is-valid"  placeholder="Entrer un Nom ...">
                                  </div>
                                  @error('nom') <span class="error text-danger">{{ $message }}</span> @enderror

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                    <label class="col-form-label"> Prenoms</label>
                                    <input type="text" wire:model.lazy="prenom" class="form-control @error('prenom') is-invalid @enderror"  placeholder="Enter votre prenom ...">
                                  </div>
                                  @error('prenom') <span class="error text-danger">{{ $message }}</span> @enderror

                                   <div class="form-group" Style="margin-bottom: 0px!important;">
                                     <label class="col-form-label"> Email</label>
                                    <input type="email" wire:model.lazy="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Enter votre Email ...">
                                  </div>
                                  @error('email') <span class="error text-danger">{{ $message }}</span> @enderror

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                      <label class="col-form-label">contact</label>

                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" wire:model.lazy="contact" class="form-control @error('contact') is-invalid @enderror" placeholder="+225 ........98">
                                      </div>
                                    @error('contact') <span class="error text-danger">{{ $message }}</span> @enderror
                                      <!-- /.input group -->
                                  </div>


                                      <div class="form-group"  Style="margin-bottom: 0px!important;">
                                        <label>Ville</label>
                                        <input type="text" wire:model.lazy="ville" class="form-control @error('ville') is-invalid @enderror" placeholder="Ville ...">
                                      </div>
                                    @error('ville') <span class="error text-danger">{{ $message }}</span> @enderror

                                  @elseif($currentPage == 2)
                                      <div class="form-group"  Style="margin-bottom: 0px!important;">
                                        <label>Adresse</label>
                                        <input type="text" wire:model.lazy="adresse" class="form-control" placeholder="Adresse ..." >
                                      </div>

                                      <div class="form-group" Style="margin-bottom: 0px!important;">
                                        <label>Role</label>
                                          <select wire:model.lazy="Selectrole" class="custom-select @error('Selectrole') is-invalid @enderror">
                                            <option selected>Veuillez choisir un type</option>
                                            <option value="Utilisateurs">users</option>
                                            <option value="SuperAdmin">Administrateurs</option>
                                            <option value="Fournisseur">Fournisseur</option>
                                            <option value="Livreurs">Livreur</option>
                                          </select>
                                      </div>
                                  @error('Selectrole') <span class="error text-danger">{{ $message }}</span> @enderror


                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                    <label>Mot de passe</label>
                                      <input type="password" wire:model.lazy="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password ...">
                                  </div>
                                  @error('password') <span class="error text-danger">{{ $message }}</span> @enderror

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                    <label>Confirmer votre Mot de passe</label>
                                      <input type="password" wire:model.debounce.150ms="confirmationPassword" class="form-control @error('confirmationPassword') is-invalid @enderror" placeholder="Confirm Password ...">
                                  </div>
                                  @error('confirmationPassword') <span class="error text-danger">{{ $message }}</span> @enderror
                                  @endif

                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">
                                  <img src="@if($currentPage == 1) {{ asset('../Backend/dist/img/saveUser.gif') }} @else {{ asset('../Backend/dist/img/confiident.gif') }} @endif" alt="" class="img-fluid mt-3">
                             </div>
                        <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->




            </div>
              @if($currentPage == 1)
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="button" wire:click="nextCurrentPage" class="btn btn-primary">Suivant</button>
            </div>
              @elseif($currentPage == 2)
              <div class="modal-footer justify-content-between">
                  <button type="button" wire:click="PrecedenteCurrentPage" class="btn btn-danger" >Retour</button>
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
              @endif
          </div>
          </form>

          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



<!-- Modal de modification -->

      <div  wire:ignore.self class="modal fade" id="UserEdit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- <div class="overlay">
                <i class="fas fa-2x fa-sync fa-spin"></i>
            </div> -->
            <div class="modal-header bg-warning">
              <h4 class="modal-title">Modifier {{$nom}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">



                        <!-- /.card-header -->
                    <div class="card-body" style="padding: 0px!important;">
                      <form wire:submit.prevent="changeUser">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                 <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Noms</label>
                                    <input type="text" wire:model.debounce.900ms="nom" class="form-control @error('nom') is-invalid @enderror is-valid"  placeholder="Entrer un Nom ...">
                                  </div>
                                  @error('nom') <span class="error text-danger">{{ $message }}</span> @enderror


                                   <div class="form-group" Style="margin-bottom: 0px!important;">
                                     <label class="col-form-label"> Email</label>
                                    <input type="email" wire:model.lazy="email" class="form-control @error('email') is-invalid @enderror" id="inputSuccess" placeholder="Enter votre Email ...">
                                  </div>
                                  @error('email') <span class="error text-danger">{{ $message }}</span> @enderror



                                      <div class="form-group"  Style="margin-bottom: 0px!important;">
                                        <label>Ville</label>
                                        <input type="text" wire:model.lazy="ville" class="form-control @error('ville') is-invalid @enderror" placeholder="Ville ...">
                                      </div>
                                    @error('ville') <span class="error text-danger">{{ $message }}</span> @enderror



                                      <div class="form-group" Style="margin-bottom: 0px!important;">
                                        <label>Role</label>
                                          <select wire:model.lazy="Selectrole" class="custom-select @error('Selectrole') is-invalid @enderror">
                                            <option >--idem</option>
                                            <option value="utilisateurs">users</option>
                                            <option value="SuperAdmin">Administrateurs</option>
                                            <option value="Entreprise">Entreprise</option>
                                          </select>
                                      </div>
                                  @error('Selectrole') <span class="error text-danger">{{ $message }}</span> @enderror


                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">
                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                    <label class="col-form-label"> Prenoms</label>
                                    <input type="text" wire:model.debounce.900ms="prenom" class="form-control @error('prenom') is-invalid @enderror"  placeholder="Enter votre prenom ...">
                                  </div>
                                  @error('prenom') <span class="error text-danger">{{ $message }}</span> @enderror


                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                      <label class="col-form-label">contact</label>

                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" wire:model.lazy="contact" class="form-control @error('contact') is-invalid @enderror" placeholder="+225 ........98">
                                      </div>
                                    @error('contact') <span class="error text-danger">{{ $message }}</span> @enderror
                                      <!-- /.input group -->
                                  </div>

                                  <div class="form-group"  Style="margin-bottom: 0px!important;">
                                        <label>Adresse</label>
                                        <input type="text" wire:model.lazy="adresse" class="form-control" placeholder="Adresse ..." >
                                      </div>

                                  <div class="form-group"  Style="margin-bottom: 0px!important;">
                                        <label>Profession</label>
                                        <input type="text" wire:model.lazy="profession" class="form-control" placeholder="Adresse ..." >
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



      <div wire:ignore.self class="modal fade" id="checkUser">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Details utilisateur</h4>
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

                                    <div class="widget-user-header bg-info">
                                        <h3 class="widget-user-username">{{$nom}} </h3>
                                        <h5 class="widget-user-desc">{{$prenom}}</h5>
                                        </div>
                                        <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="@if(!is_null($ASmodifPhoto) && $ASmodifPhoto != 'default.jpg' ) ../Backend/images/User/{{$ASmodifPhoto}} @else ../dist/img/user1-128x128.jpg @endif" alt="User Avatar">
                                      </div>


                                    <div class="card-footer">
                                        <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                            <h5 class="description-header">{{$number_commande_user}}</h5>
                                            <span class="description-text">commandes</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                            <h5 class="description-header">Profession</h5>
                                            @if(!is_null($profession))
                                            <span class="description-text">{{$profession}}</span>
                                            @else
                                            <span class="description-text">non signed</span>
                                            @endif
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                              <h5 class="description-header">Droits</h5>
                                              @if( $Selectrole == "SuperAdmin")
                                                <span class="badge bg-success">Admin</span>
                                                @else
                                                <span class="badge bg-danger">utilisateur</span>
                                                @endif
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
