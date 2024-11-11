@extends('../Backend/layouts/app')


@section('title')
    Sous Categorie
@endsection


@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        <div class="col-sm-9 float-end">
            <h1>Sous Categories</h1>
          </div>

          <div class="col-sm-3">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="info-box shadow-lg">
                <span class="info-box-icon bg-info"><i class="far fa-star"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Totals</span>
                    <span class="info-box-number"> {{ App\Models\SousCategorie::count()}}</span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>


    <livewire:live-sous-categorie />


      
</div>



@endsection