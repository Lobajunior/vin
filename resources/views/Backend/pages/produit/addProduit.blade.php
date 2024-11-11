
@extends('../Backend/layouts/app')


@section('title')
    Ajout Produit
@endsection


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        <div class="col-sm-10 ">
            <h1>Ajouter un produit</h1>
          </div>


        </div>
        @if(session()->has('save_produit'))
						<div class="alert alert-success">
						{{session()->get('save_produit') }}
						</div>
					@endif
      </div><!-- /.container-fluid -->
    </section>



               <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card" >
              <div class="card-header" style="background-color: #0c0554;">
                <h3 class="card-title" style="color: #fff;">Ajouter un ou plusieurs produits</h3>
              </div>
              @if($errors->count() > 0)
                
                l'un des champs n'est pas correctement remplis
                   
            @endif
            
                    <div class="card-body">
                      <form action="{{ route('ajoutProduits') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                 <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Noms</label>
                                    <input type="text" name="libelle"  class="form-control @error('libelle') is-invalid @enderror"  placeholder="Nom du produit..." required>
                                  </div>
                                  @error('libelle') <span class="error invalid-feedback">{{$message}}</span> @enderror

                                   <div class="form-group" Style="margin-bottom: 0px!important;">
                                         <label class="col-form-label"> type</label>
                                            <select  class="custom-select @error('type') is-invalid @enderror" name="type" required>
                                                <option value="">Veuillez choisir le type</option>
                                                <option value="Hommes">Hommes</option>
                                                <option value="Femmes">Femmes</option>
                                                <option value="Enfants">Enfants</option>
                                                <option value="Tous genres">Tous genres</option>
                                                <option value="Accessoire">Accessoires</option>
                                            </select>
                                  @error('type') <span class="error invalid-feedback">{{$message}}</span> @enderror
                                  </div>

                                      <div class="form-group"  Style="margin-bottom: 1px!important;">
                                            <label>tailles</label>
                                            <select class="select2 @error('SelectTaille') is-invalid @enderror" multiple="multiple" name="SelectTaille[]" data-placeholder="Selectionnez les tailles...." style="width: 100%;">
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                                <option value="L">L</option>
                                                <option value="M">M</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="36">36</option>
                                                <option value="38">38</option>
                                                <option value="40">40</option>
                                            </select>
                                      </div>
                                  @error('SelectTaille') <span class="error invalid-feedback">veuillez selectionnez la taille</span> @enderror

                                      <div class="form-group" Style="margin-bottom: 0px!important;">
                                        <label>Image Principale (200px /300px)</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="photoPrincipale" required>
                                            <label class="custom-file-label" >Choisir une image</label>
                                        </div>
                                      </div>

                                    
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">

                                    <div class="form-group" Style="margin-bottom: 0px!important;">
                                         <label class="col-form-label">Categories</label>
                                            <!-- <select  class="custom-select ">
                                              <option >Selectionnez</option>
                                              @foreach($souscat as $souscats)
                                                <option value="{{$souscats->id}}">{{$souscats->libelle}}</option>
                                                @endforeach
                                            </select> -->

                                            <select class="select2  @error('id_souscat') is-invalid @enderror" name="id_souscat"  multiple="multiple" data-placeholder="Selectionnez une categorie...." style="width: 100%;" required>
                                              @foreach($souscat as $souscats)
                                                <option value="{{$souscats->id}}">{{$souscats->libelle}}</option>
                                                @endforeach
                                            </select>
                                  </div>
                                  @error('id_souscat') <span class="error invalid-feedback">une categorie est requise</span> @enderror


                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                    <label class="col-form-label"> Stock</label>
                                    <input type="number"  class="form-control " name="qte"  placeholder="Quantite ...">
                                  </div>


                                  <div class="form-group" Style="margin-bottom: 0px!important;">
                                      <label class="col-form-label">Prix</label>
                                      <div class="input-group">
                                        <input type="text"  class="form-control @error('prix') is-invalid @enderror" name="prix" placeholder="Ex=15 000" required>
                                      </div>
                                  @error('prix') <span class="error invalid-feedback">verifier ce champs</span> @enderror
                                      <!-- /.input group -->
                                  </div>


                                  <div class="form-group"  Style="margin-bottom: 3px!important;">
                                        <label>Couleurs</label>
                                            <select class="select2" multiple="multiple" name="SelectCouleur[]" data-placeholder="Couleurs..." style="width: 100%;">
                                                <option value="red">Rouge</option>
                                                <option value="green">Vert</option>
                                                <option value="yellow">Jaune</option>
                                                <option value="blue">Bleu</option>
                                                <option value="purple">Violet</option>
                                                <option value="orange">Orange</option>
                                                <option value="black">Noir</option>
                                                <option value="white">Blanc</option>
                                            </select>
                                      </div>
                                  @error('SelectCouleur') <span class="error invalid-feedback bg-danger">verifier ce champs</span> @enderror

                                <div class="form-group" Style="margin-bottom: 0px!important;">
                                    <label>Images secondaires taille: 200 px /300 px </label>
                                     <input type="file" name="SelectImage[]" multiple="" class="form-control" >
                                </div>

                             </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group" Style="margin-bottom: 0px!important;">
                                         <label class="col-form-label">Descriptions</label>
                                        <textarea id="summernote" name="description">
                                            Place <em>some</em> <u>text</u> <strong>here</strong>
                                        </textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit"  class="btn btn-primary btn-block btn-flat">Enregistrer</button>
                    </form>
                    </div>
                    <!-- /.card-body -->

            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


        </div>
@endsection


