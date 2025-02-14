@extends('../Backend/layouts/app')


@section('title')
    Profile-Entreprise
@endsection


@section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Profile Entreprise</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <livewire:live-profile-entreprise />

  </div>


@endsection