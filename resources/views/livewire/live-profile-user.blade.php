<div>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col md-3">

                <!-- About Me Box -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">A propos de moi!</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Adresse</strong>

                        <p class="text-muted">{{$ville}}, {{$adresse}}</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Competences</strong>

                        <p class="text-muted">
                        <span class="tag tag-danger">UI Design</span>
                        <span class="tag tag-success">Coding</span>
                        <span class="tag tag-info">Javascript</span>
                        <span class="tag tag-warning">PHP</span>
                        <span class="tag tag-primary">Node.js</span>
                        </p>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>

            <div class="col-md-3">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header text-white"
                        style="background: url('../Backend/dist/img/photo1.png') center center;">
                        <h3 class="widget-user-username text-right">{{$prenom}} {{$nom}}</h3>
                        <h5 class="widget-user-desc text-right">{{$email}}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="@if($AsphotoProfile) {{$AsphotoProfile->temporaryUrl()}} @else ../Backend/images/User/{{$photo_profile}} @endif" alt="SelontoiUser">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-6 border-right">
                                <div class="description-block">
                                <h5 class="description-header">contact</h5>
                                <span class="description-text">{{$contact}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6 border-right">
                                <div class="description-block">
                                <h5 class="description-header">Status</h5>
                                @if(Auth::user()->role == "SuperAdmin")
                                <span class=" badge bg-success">Admin</span>
                                @elseif(Auth::user()->role == "Livreurs")
                                <span class=" badge bg-success">Livreur</span>

                                @endif
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
          <div class="col-md-6">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Reglage</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Confidentialités</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                 

                <div class="active tab-pane" id="settings">
                    <form class="form-horizontal" wire:submit.prevent="changeUser">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                          <input type="text" wire:model.lazy="nom" class="form-control is-valid"  placeholder="Nom...">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Prenom</label>
                        <div class="col-sm-10">
                          <input type="text"  wire:model.lazy="prenom" class="form-control is-valid" placeholder="Prenoms...">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email"  wire:model.lazy="email" class="form-control is-valid"  placeholder="Email">
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Adresse</label>
                            <div class="col-sm-10">
                            <input type="text"  wire:model.lazy="adresse" class="form-control is-valid" placeholder="Adresse">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Contact</label>
                        <div class="col-sm-10">
                        <input type="text"  wire:model.lazy="contact" class="form-control is-valid" placeholder="Contact....">
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-warning">Modifier</button>
                        </div>
                      </div>
                    </form>



                    <hr>

                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-6 col-form-label">Photo de Profile</label>
                      <div class="col-sm-10">
                          
                      <form wire:submit.prevent="changeProfilePicture">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" wire:model.lazy="AsphotoProfile" id="customFile">
                            <label class="custom-file-label" for="customFile">Choisir un fichier</label>
                          </div>

                      </div>
                      <div class="col-sm-4">
                          <button type="submit" class="btn btn-info btn-block btn-flat mt-3"><i class="fa fa-edit"></i> Modifier</button>
                      </div>
                    </form>
                    </div>



                </div>
                  <!-- /.tab-pane -->


                  <div class="tab-pane" id="timeline">
                     <div class="form-group row">
                          <label for="inputName" class=" col-form-label">Informations confidentielles</label>
                        </div>

                        <hr>

                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-3 col-form-label">Passwords</label>
                          <div class="col-sm-10">
                            <input type="text"  class="form-control is-valid" placeholder="XX%xx%xx%XX..." disabled>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-10">
                            <input type="text"  class="form-control is-valid" placeholder="Confirmation de  Mot de passe ..." disabled>
                          </div>
                        </div>

                        <div class="form-group row">
                          <div class="col-sm-9 mx-auto mt-2">
                            <a href="{{ route('password.request') }}"><button type="button" class="btn btn-warning btn-block btn-flat"><i class="fa fa-edit"></i> modifier votre mot de passe</button></a>
                          </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-6 col-form-label">Supprimer mon compte</label>
                          <div class="col-sm-8 mx-auto mt-3">
                            <button type="button" class="btn btn-danger btn-block btn-flat"><i class="fa fa-trash"></i> Supprimer</button>
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





</div>
