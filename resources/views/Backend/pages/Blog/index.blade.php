@extends('../Backend/layouts/app')


@section('title')
    Blogs
@endsection


@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    @if(session()->has('modify_success'))
            <div class="alert alert-success">
            {{session()->get('modify_success') }}
            </div>
        @endif
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blogs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard/home">Accueil</a></li>
              <li class="breadcrumb-item active">blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
    <livewire:live-blog />

    </section>
    <!-- /.content -->
  </div>


  <livewire:live-categorie-blog />

@endsection