<div>




    <div class="row" style="padding: 1%!important;">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               
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
                      <th style="width: 30px;">photo</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Email</th>
                      <th>ville</th>
                      <th>Contacts</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($utilisateur as $utilisateurss)
                    <tr>
                      <td>
                        <div class="widget-user-image" style="width:100%!important;">
                          <img class="img-circle elevation-2" src="{{ URL::asset('../Backend/images/User/'.$utilisateurss->photo) }}" alt="Us" style="width:100%!important;">
                        </div>
                      </td>
                      <td>{{$utilisateurss->nom}} {{ $utilisateurss->prenom}}</td>
                      <td>{{$utilisateurss->created_at->diffForHumans()}}</td>
                      <td>{{ $utilisateurss->email}}</td>
                      <td>{{ $utilisateurss->villes}}</td>
                     
                      <td>{{$utilisateurss->phone}}</td>
                      <td>
                      <div class="timeline-footer">
                          <a class="btn btn-success btn-sm"  wire:click="checkLivreurLive({{$utilisateurss->id}})" data-toggle="modal" data-target="#checkLivreur"> <i class="fas fa-eye mr-1"></i></a>
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

      <div wire:ignore.self class="modal fade" id="checkLivreur">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #308612;">
              <h4 class="modal-title text-white">Details Livreur</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                        <div class="row">
                            <!-- /.col -->
                                <div class="col-md-4 ">
                                    <!-- Widget: user widget style 1 -->
                                    <div class="card card-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->

                                    <div class="widget-user-header bg-success">
                                        <h3 class="widget-user-username">{{$nom}} </h3>
                                        <h5 class="widget-user-desc">{{$prenom}}</h5>
                                        </div>
                                        <div class="widget-user-image">
                                        <img class="img-circle elevation-2" src="@if(!is_null($ASmodifPhoto) && $ASmodifPhoto != 'default.jpg' ) ../Backend/images/User/{{$ASmodifPhoto}} @else ../dist/img/user1-128x128.jpg @endif" alt="User Avatar">
                                      </div>


                                    <div class="card-footer">
                                        <div class="row">
                                        <div class="col-sm-6 border-right">
                                            <div class="description-block">
                                            <h5 class="description-header">32 %</h5>
                                            <span class="description-text">commandes</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6 border-right">
                                            <div class="description-block">
                                            <h5 class="description-header">Profession</h5>
                                           
                                            <span class="badge bg-success">Livreur</span>
                                          
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                      
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    </div>
                                    <!-- /.widget-user -->
                                </div>
                                <!-- /.col -->


                                <div class="col-md-8">
                                  <div class="row">
                                      <div class="col-12">
                                        <div class="card card-primary card-tabs">
                                          <div class="card-header p-0 pt-1">
                                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                              <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Commades (A faire)</a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">En cour</a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Terminer</a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Annuler</a>
                                              </li>
                                            </ul>
                                          </div>
                                          <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper dui molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam odio magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi, vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta, ante et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta sem. Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras lacinia erat eget sapien porta consectetur.
                                              </div>
                                              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                                Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
                                              </div>
                                              <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                                                Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
                                              </div>
                                              <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                                                Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                                              </div>
                                            </div>
                                          </div>
                                          <!-- /.card -->
                                        </div>
                                      </div>
                                    
                                  </div>

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
