<div>
    
    
<div class="row mb-3" Style="margin-left: 3%;">
    <div class="col-lg-3 col-sm-6 col-xs-6">
             <button type="reset" class="btn btn-warning col ml-3" data-toggle="modal" data-target="#addSlide">
                        <i class="fas fa-plus-circle"></i>
                        <span>Ajouter un Slide</span>
                      </button>
    </div>
</div>
<!-- end boutton ajout -->



    <div class="col-md-11 mx-auto" >

        <div class="card">
        
        <!-- /.card-header -->
        <div class="card-body">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ URL::asset('Backend/images/Slide/'.$slidefirst->image) }}" alt="First slide">
                </div>
            @if(!is_null($Listslide) && $Listslide->count() >0)
                @foreach($Listslide as $itemListslide)
                <div class="carousel-item ">
                  <img class="d-block w-100" src="{{ URL::asset('Backend/images/Slide/'.$itemListslide->image) }}" alt="First slide">
                </div>
              @endforeach
              @endif
               
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-left"></i>
                </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-right"></i>
                </span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </div>


    <section class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12 col-md-11 mx-auto">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Quelques Slides   
                    </h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                            <th>mini_titre</th>
                            <th>Images</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                          <tr>
                                <td>{{$slidefirst->id}}</td>
                                <td>{{$slidefirst->libelle}}</td>
                                <td>{{$slidefirst->mini_titre}}</td>
                                <td style="width: 15%!important; height: 100%;">
                                  <img src="{{ URL::asset('Backend/images/Slide/'.$slidefirst->image) }}" alt="" style="width: 100%!important; height: 100%;">
                                </td>
                                <td>{{$slidefirst->etat == 0 ? 'Desactiver' : 'Activer'}}</td>
                                <td class="project-actions text-right">
                                @if($slidefirst->etat == 0 )
                                  <a class="btn btn-success btn-sm" wire:click="activate_slide({{$slidefirst->id}})">
                                        <i class="fas fa-check">
                                        </i>
                                        Activer
                                    </a>
                                    @else
                                   <a class="btn btn-warning btn-sm" wire:click="activate_slide({{$slidefirst->id}})">
                                        <i class="fas fa-no-check">
                                        </i>
                                        Desactiver
                                    </a>
                                    @endif
                                    <a class="btn btn-info btn-sm"  data-toggle="modal" data-target="#editBlogSlide" >
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        modifier
                                    </a>
                                    <a class="btn btn-danger btn-sm" wire:click="deleteSlide({{$slidefirst->id}})">
                                        <i class="fas fa-trash">
                                        </i>
                                        suprimer
                                    </a>
                                </td>
                            </tr>
                        @if(!is_null($Listslide) && $Listslide->count() >0)
                        @foreach($Listslide as $itemListslide)
                            <tr>
                                <td>{{$itemListslide->id}}</td>
                                <td>{{$itemListslide->libelle}}</td>
                                <td>{{$itemListslide->mini_titre}}</td>
                                <td style="width: 15%!important; height: 100%;">
                                  <img src="{{ URL::asset('Backend/images/Slide/'.$itemListslide->image) }}" alt="" style="width: 100%!important; height: 100%;">
                                </td>
                                <td>{{$itemListslide->etat == 0 ? 'Desactiver' : 'Activer'}}</td>
                                <td class="project-actions text-right">
                                  @if($itemListslide->etat == 0 )
                                    <a class="btn btn-success btn-sm"  wire:click="activate_slide({{$itemListslide->id}})">
                                          <i class="fas fa-check">
                                          </i>
                                          Activer
                                      </a>
                                      @else
                                     <a class="btn btn-warning btn-sm" wire:click="activate_slide({{$itemListslide->id}})">
                                        <i class="fas fa-no-check">
                                        </i>
                                        Desactiver
                                    </a>
                                      @endif
                                    <a class="btn btn-info btn-sm"  data-toggle="modal" data-target="#editBlogSlide" >
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        modifier
                                    </a>
                                    <a class="btn btn-danger btn-sm" wire:click="deleteSlide({{$itemListslide->id}})">
                                        <i class="fas fa-trash">
                                        </i>
                                        suprimer
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>
                                <h6 class="text-center text-info">
                                    Aucun slide
                                </h6>
                            </td>
                        </tr>

                        @endif
                        </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>
            </div>

        </div>
    </section>








<!-- Moidel Ajout slide -->

    <div wire:ignore.self class="modal fade" id="addSlide">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div wire:loading>
                <div class="overlay">
                    <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
            </div>
            <div class="modal-header bg-info">
              <h4 class="modal-title">Ajouter une Slide</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form wire:submit.prevent="createSlide">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Libelle</label>
                        <input type="text" wire:model.lazy="libelle" class="form-control "  placeholder="Enter ...">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mini titre</label>
                        <input type="text" wire:model.lazy="mini_titre" class="form-control "  placeholder="Enter ...">
                      </div>
                    </div> 
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" wire:model.lazy="description" rows="3" placeholder="Entrer une description..."></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Image taille(1660 px / 425 px)</label>
                        <input type="file" wire:model.debounce.50ms="AsImage"  class="form-control @error('AsImage') is-invalid @enderror is-valid" placeholder="Ajouter une Images ..." >
                      </div>
                      @error('AsImage') <span class="error invalid-feedback">{{$message}}</span> @enderror
                    </div>
                  </div>

                  @if($AsImage)
                  <div style="width: 98%!important; height: 20%;">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <img src="{{ $AsImage->temporaryUrl() }}" alt="" style="width: 100%!important; height: 20%;">
                      </div>
                    </div>
                  </div>
                  </div>

                @endif


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- End modal ajout slide -->
</div>
