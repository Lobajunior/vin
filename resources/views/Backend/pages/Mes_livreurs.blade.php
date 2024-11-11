@extends('../Backend/layouts/app')


@section('title')
    Livreurs
@endsection


@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        <div class="col-sm-8 ">
            <h1>Livreurs</h1>
          </div>


        <div class="col-sm-3 ">
                <div class="info-box shadow-lg">
            

                <div class="info-box-content">
                  <img src="../Backend/dist/img/deli2.gif" alt="">

                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
        </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>


    <livewire:live-livreur />


      
</div>



@endsection