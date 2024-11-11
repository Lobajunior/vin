
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
            <h1>Modifier la description du Produit ({{$produit->libelle}})</h1>
          </div>


        </div>
        @if(session()->has('save_produit'))
						<div class="alert alert-success">
						{{session()->get('save_produit') }}
						</div>
					@endif
      </div><!-- /.container-fluid -->
    </section>

            <form action="{{ route('change_description_at_product',$produit->slug) }}" method="POST" style="margin:2%!important;">
              @csrf
              @method('POST')
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group" Style="margin-bottom: 0px!important;">
                                         <label class="col-form-label">Descriptions</label>
                                        <textarea id="summernote" name="description" value="{{ old($produit->description) }}">
                                            {{ old($produit->description) ?? $produit->description}}
                                        </textarea>
                                </div>
                            </div>
                        </div>


                <div class="modal-footer justify-content-between">
                                  <button type="button"  class="btn btn-danger">Annuler</button>
                                  <button type="submit" class="btn btn-info">Sauvegarder</button>
                                </div>
                  
          </form>
@endsection