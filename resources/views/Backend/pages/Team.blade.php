@extends('../Backend/layouts/app')


@section('title')
    Equipe
@endsection


@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1>Notre Equipe</h1>
          </div>
          <div class="col-sm-3">
             <button type="submit" data-toggle="modal" data-target="#addTeam" class="btn btn-info btn-block btn-flat"><i class="fa fa-plus-circle"></i> Ajouter un membre</button> 
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

     <livewire:live-team />

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




@endsection