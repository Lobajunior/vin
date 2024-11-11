
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
            <h1>Modifier la description de Votre Page A propos ()</h1>
          </div>


        </div>
                    @if(session()->has('description_about_change'))
						<div class="alert alert-success">
						{{session()->get('description_about_change') }}
						</div>
					@endif
      </div><!-- /.container-fluid -->
    </section>

            <form action="{{ route('modif_descriptionAbouts') }}" method="POST" style="margin:2%!important;">
              @csrf
              @method('POST')
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group" Style="margin-bottom: 0px!important;">
                                         <label class="col-form-label">Descriptions</label>
                                        <textarea id="summernote" name="description" value="">
                                            {{ App\Models\About::first()->description}}
                                        </textarea>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer justify-content-between">
                                  <button type="button"  class="btn btn-danger">Annuler</button>
                                  <button type="submit" class="btn btn-info">Sauvegarder</button>
                                </div>
                  
          </form>


</div>
@endsection