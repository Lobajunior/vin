<div>


        <div class="row heading-bg"  style=" height: 130px!important; background: @if( isset($about)  &&  !is_null($about->banner) ) url('../Backend/images/About/{{$about->banner}}')   @else url({{ asset('../Backend/dist/img/bschool.jpg') }}) @endif;background-position: center center; background-size: cover; ">>
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                <h5 class="txt-dark"></h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-3 col-sm-4 col-md-4 col-xs-4">

                <!-- <img src="../iveau.gif" alt="Lotties place"> -->

            </div>
            <!-- /Breadcrumb -->
        </div>


@if(!isset($about))
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        <div class="col-sm-4 ">
            <button type="button" style="padding-left: 4%; padding-rigth: 1%; background-color:#170d7b;" data-toggle="modal" data-target="#addAbout" class="btn btn-info  btn-flat"><i class="fa fa-plus-circle mr-2"></i>Create une session a propos</button>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>
@endif

@if($about)
    <!-- Main content -->
    <section class="content mt-3 ml-3" >

            <!-- Default box -->
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">My Page Apropos</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                    <div class="col-12">
                        <h4>{{$about->titre}} </h4>

                        <hr>
                        <div class="post clearfix">
                            <p>
                            {{$about->pte_description}}

                            @if(!is_null($about->description))

                            {!! $about->description !!}
                            @endif
                            </p>
                            <p>
                                <a href="/dashboard/edit_about" class="btn btn-sm btn-primary">Modifier La description</a>
                            </p>
                        </div>

                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">


                                <div class="position-relative">
                                <img src="../Backend/images/About/{{$about->image}}" alt="Photo 1" class="img-fluid">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success text-lg">
                                    A propos
                                    </div>
                                </div>
                                </div>



                    <br>
                    <div class="text-muted">
                    <p class="text-sm">Client Company
                        <b class="d-block">Deveint Inc</b>
                    </p>
                    </div>

                    <div class="text-center mt-5 mb-3">
                    <a href="#" wire:click="Edit_About"  data-toggle="modal" data-target="#editAbout"  class="btn btn-sm btn-warning">Modifier les infos</a>
                    </div>
                </div>
                </div>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->
@else
<section class="content mt-3 ml-3" >
    <div class="alert alert-info alert-dismissible">
      <h5><i class="icon fas fa-info"></i> Alert!</h5>
      Aucune section a propos enregistrer pour le moment, veuillez cliquez sur le boutton <i class="fas fa-plus-circle"> </i> pour enregistrer  !
    </div>
</section>
@endif




    <div wire:ignore.self class="modal fade" id="addAbout">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">Section A propos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


                @if($AsBanner)
                        <div class="row heading-bg"  style=" height: 130px!important; background:url('{{$AsBanner->temporaryUrl()}}');background-position: center center; background-size: cover; ">
                            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                <h5 class="txt-dark"></h5>
                            </div>
                            <!-- Breadcrumb -->
                            <div class="col-lg-3 col-sm-4 col-md-4 col-xs-4">


                            </div>
                            <!-- /Breadcrumb -->
                        </div>
                @endif



                        <!-- /.card-header -->
                    <div class="card-body" style="padding: 0px!important;">
                      <form wire:submit.prevent="create_About">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                 <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Titre</label>
                                    <input type="text" wire:model.lazy="titre"  class="form-control @error('titre') is-invalid @endif"  placeholder="Entrer un titre...">
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                        <label>Ajouter une Image (200px /300px)</label>
                                        <div class="custom-file">
                                            <input type="file" wire:model.lazy="AsImage" class="custom-file-input" >
                                            <label class="custom-file-label" >Choisir une image</label>
                                        </div>
                                      </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">


                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                    <label class="col-form-label">Ajouter une Banniere ( 1000px / 430px) </label>
                                    <input type="file" wire:model.lazy="AsBanner" class="form-control "  placeholder="Quantite ...">
                                  </div>


                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                      <label class="col-form-label">Bref description</label>
                                      <textarea class="form-control" wire:model.lazy="pte_description" rows="3" placeholder="Enter ..."></textarea>
                                      <!-- /.input group -->
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


      <div wire:ignore.self class="modal fade" id="editAbout">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h4 class="modal-title">Modifier la section a propos</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">


                @if($AsBanner)
                        <div class="row heading-bg"  style=" height: 130px!important; background:url('{{$AsBanner->temporaryUrl()}}');background-position: center center; background-size: cover; ">
                            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8">
                                <h5 class="txt-dark"></h5>
                            </div>
                            <!-- Breadcrumb -->
                            <div class="col-lg-3 col-sm-4 col-md-4 col-xs-4">


                            </div>
                            <!-- /Breadcrumb -->
                        </div>
                @endif



                        <!-- /.card-header -->
                    <div class="card-body" style="padding: 0px!important;">
                      <form wire:submit.prevent="changeAbout">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                 <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Titre</label>
                                    <input type="text" wire:model.lazy="titre"  class="form-control @error('titre') is-invalid @endif"  placeholder="Entrer un titre...">
                                  </div>

                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                        <label>Ajouter une Image (200px /300px)</label>
                                        <div class="custom-file">
                                            <input type="file" wire:model.lazy="AsImage" class="custom-file-input" >
                                            <label class="custom-file-label" >Choisir une image</label>
                                        </div>
                                      </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">


                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                    <label class="col-form-label">Ajouter une Banniere ( 1000px / 430px) </label>
                                    <input type="file" wire:model.lazy="AsBanner" class="form-control "  placeholder="Quantite ...">
                                  </div>


                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                      <label class="col-form-label">Bref description</label>
                                      <textarea class="form-control" wire:model.lazy="pte_description" rows="3" placeholder="Enter ..."></textarea>
                                      <!-- /.input group -->
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
