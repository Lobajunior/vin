@extends('../Backend/layouts/app')


@section('title')
    Utilisateurs
@endsection


@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        <div class="col-sm-10 ">
            <h1>Utilisateurs</h1>
          </div>


        <div class="col-sm-2 ">
            <div class="col-md-12 col-sm-12 col-5 ">
                <div class="info-box shadow-lg">
            

                <div class="info-box-content">
                  <img src="../Backend/dist/img/reglage.gif" alt="">

                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>


    <livewire:live-users />
    


</div>



@endsection