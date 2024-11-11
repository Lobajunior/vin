@extends('../Backend/layouts/app')


@section('title')
    Partenaire
@endsection


@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1>Partenaires</h1>
          </div>
          <div class="col-sm-3">
            <button type="submit" style="padding-left: 4%; padding-rigth: 1%;" data-toggle="modal" data-target="#addPartenaire" class="btn btn-primary btn-flat float-right"><i class="fa fa-plus-circle"></i> Ajouter un partenaire</button> 
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>



        <livewire:live-partenaire />


</div>


@endsection