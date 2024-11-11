
@extends('../Backend/layouts/app')


@section('title')
    Ajout Blog
@endsection


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        <div class="col-sm-10 ">
            <h1>Modification</h1>
          </div>


        </div>
       
      </div><!-- /.container-fluid -->
    </section>



               <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Modifier ({{$blog->titre}}) </h3>
              </div>
              @if($errors->count() > 0)
                l'un des champs n'est pas correctement remplis
                @endif
            
                    <div class="card-body">
                      <form action="{{ route('modifyBlog',$blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                 <div class="form-group" Style="margin-bottom: 0px!important;">
                                  <label class="col-form-label"> Titre</label>
                                    <input type="text" name="titre"  class="form-control @error('titre') is-invalid @enderror"  value="{{ old($blog->titre) ?? $blog->titre }}" >
                                  </div>
                                  @error('titre') <span class="error invalid-feedback">{{$message}}</span> @enderror

                                      <div class="form-group" Style="margin-bottom: 0px!important;">
                                        <label>Image Principale (Taille: 300px /250px)</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="photo">
                                            <label class="custom-file-label" >Choisir une image</label>
                                        </div>
                                      </div>

                                    
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6">

                                    <div class="form-group" Style="margin-bottom: 0px!important;">
                                         <label class="col-form-label">Categories</label>
                                            <select  class="custom-select  @error('id_cat') is-invalid @enderror"  name="id_cat" >
                                              <option value="">Selectionnez</option>
                                              @foreach($catBlog as $catBlogs)
                                                <option value="{{ old($blog->blog_cat_id) ?? $blog->blog_cat_id }}">{{$catBlogs->libelle}}</option>
                                                @endforeach
                                            </select>
                                  </div>
                                  @error('id_cat') <span class="error invalid-feedback">une categorie est requise</span> @enderror


                                <div class="form-group" Style="margin-bottom: 0px!important;">
                                    <label>Images secondaires taille: 300 px /250 px </label>
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
                                            {!! $blog->description !!}
                                        </textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit"  class="btn btn-warning btn-block btn-flat">Sauvegarder</button>
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


