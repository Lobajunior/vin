@extends('../Backend/layouts/app')


@section('title')
    Slides
@endsection


@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1>Mes Slides</h1>
          </div>
     
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard/home">Tableau de bord</a></li>
              <li class="breadcrumb-item active">slides</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>





    <livewire:live-slide />

 

</div>



@endsection