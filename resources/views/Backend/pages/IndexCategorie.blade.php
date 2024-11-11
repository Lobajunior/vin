@extends('../Backend/layouts/app')


@section('title')
    Categorie
@endsection


@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Categories</h1>
          </div>
          <div class="col-sm-3">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="info-box shadow-lg">
                <span class="info-box-icon" style="background-color: #0c0554;"><i style="color: #ffffff;" class="far fa-star"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Categories</span>
                    <span class="info-box-number"> {{ App\Models\Categorie::count()}}</span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
          </div>
          <div class="col-sm-3">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="info-box shadow-lg">
                <span class="info-box-icon" style="background-color: #0c0554;"><i style="color: #fff;" class="far fa-star"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Best Categories</span>
                    <span class="info-box-number">{{ App\Models\Categorie::where('is_best',1)->count()}} / {{ App\Models\Categorie::count()}}</span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <livewire:live-categorie />

      
</div>



@endsection