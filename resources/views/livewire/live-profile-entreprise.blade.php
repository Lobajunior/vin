<div>
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="@if($ASLogo) {{ $ASLogo->temporaryUrl() }} @else {{URL::asset('../Backend/images/User/'.$AsphotoExist) }} @endif"
                       alt="logo-selontoi">
                </div>

                <h3 class="profile-username text-center">{{$nom}}</h3>

                <p class="text-muted text-center">{{$email}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Contacts:</b> <a class="float-right">{{$contact}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Adresse :</b> <a class="float-right">{{$adresse}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Gerant :</b> <a class="float-right">{{$prenom_gerant}} {{$nom_gerant}} </a>
                  </li>
                </ul>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
 
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                <li class="nav-item "><a class="nav-link active" href="#settings" data-toggle="tab">Entreprise</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Profile Gérant</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body" style="padding: 0.8rem!important;">
                <div class="tab-content">

                <div class="active tab-pane" id="settings">
                    <div class="card-body" style="padding: 0px!important;">
                      <form wire:submit.prevent="modifyEntreprise">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                 <div class="form-group" >
                                  <label class="col-form-label"> Noms</label>
                                    <input type="text" wire:model.lazy="nom"  class="form-control  is-valid"  placeholder="Entrer un Nom ...">
                                  </div>

                                   <div class="form-group" >
                                     <label class="col-form-label"> Email</label>
                                    <input type="email" wire:model.lazy="email"  class="form-control " placeholder="Enter votre Email ...">
                                  </div>

                                      <div class="form-group"  >
                                        <label>Ville</label>
                                        <input type="text" wire:model.lazy="ville"  class="form-control " placeholder="Ville ...">
                                      </div>
                                    
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">

                                  <div class="form-group" >
                                      <label class="col-form-label">contact</label>

                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" wire:model.lazy="contact" class="form-control" placeholder="+225 ........98">
                                      </div>
                                  </div>

                                    <div class="form-group"  >
                                      <label>Adresse</label>
                                      <input type="text" wire:model.lazy="adresse" class="form-control" placeholder="Adresse ..." >
                                    </div>

                                  
                                  <div class="form-group">
                                    <label for="exampleInputFile">Selectionnez un logo</label>
                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" wire:model.lazy="ASLogo" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Selectionnez file</label>
                                      </div>
                                    </div>
                                  </div>

                             </div>
                      
                      
                             <button type="submit" class="btn btn-success">Enregistrer</button>
                        <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        </form>
                    </div>
                </div>
                  <!-- /.tab-pane -->


                  <div class="tab-pane" id="timeline">
  
                              <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                  <div class="card-header text-muted border-bottom-0">
                                    Gerant de {{$nom}}
                                  </div>
                                  <div class="card-body pt-0">
                                    <div class="row">
                                      <div class="col-7">
                                        <h2 class="lead"><b>{{$nom_gerant}} {{$prenom_gerant}}</b></h2>
                                        <p class="text-muted text-sm"><b>Prefession: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                          <li class="small mb-2"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{$ville_gerant}} {{$adresse_gerant}}</li>
                                          <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$contact_gerant}}</li>
                                        </ul>
                                      </div>
                                      <div class="col-5 text-center">
                                        <img src="@if($ASphotoGerant)  {{$ASphotoGerant->temporaryUrl() }}  @else {{URL::asset('../Backend/images/User/'.$ASphotoGerantExist) }} @endif" alt="user-avatar" class="img-circle img-fluid">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="card-footer">
                                    <div class="text-right">
                                      <a href="#" wire:click="editprofileGerant" data-toggle="modal" data-target="#GerantEdit" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> Modifier les info
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                         
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->










      <div  wire:ignore.self class="modal fade" id="GerantEdit">
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

                  <form wire:submit.prevent="modifyGerant">
                            <div class="card-body" style="padding: 0px!important;">
                                 
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group" >
                                              <label class="col-form-label"> Noms</label>
                                                <input type="text" wire:model.lazy="nom_gerant"  class="form-control  is-valid"  placeholder="Entrer un Nom ...">
                                              </div>

                                              <div class="form-group" >
                                                <label class="col-form-label"> Email</label>
                                                <input type="email" wire:model.lazy="email_gerant"  class="form-control " id="inputSuccess" placeholder="Enter votre Email ...">
                                              </div>

                                                  <div class="form-group"  >
                                                    <label>Ville</label>
                                                    <input type="text" wire:model.lazy="ville_gerant"  class="form-control " placeholder="Ville ...">
                                                  </div>
                                                
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-12 col-sm-6">

                                            <div class="form-group" >
                                                <label class="col-form-label">Prenoms</label>
                                                <input type="text" wire:model.lazy="prenom_gerant"  class="form-control  is-valid"  placeholder="Entrer un Nom ...">
                                              </div>


                                              <div class="form-group" >
                                                  <label class="col-form-label">contact</label>

                                                  <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="text" wire:model.lazy="contact_gerant" class="form-control" placeholder="+225 ........98">
                                                  </div>
                                              </div>

                                                <div class="form-group"  >
                                                  <label>Adresse</label>
                                                  <input type="text" wire:model.lazy="adresse_gerant" class="form-control" placeholder="Adresse ..." >
                                                </div>

                                              
                                              <div class="form-group">
                                                <label for="exampleInputFile">choisir une photo de profile</label>
                                                <div class="input-group">
                                                  <div class="custom-file">
                                                    <input type="file"  class="custom-file-input" wire:model.lazy="ASphotoGerant">
                                                    <label class="custom-file-label" for="exampleInputFile">Selectionnez file</label>
                                                  </div>
                                                </div>
                                              </div>

                                        </div>
                                  
                                  
          
                                    <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                            </div>


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
