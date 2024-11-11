@extends('../Backend/layouts/app')


@section('title')
    Produits
@endsection


@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

        <div class="col-sm-4 ">
            <h1>Produits</h1>
          </div>

          
          <div class="col-sm-4 " onclick="location.href = '/dashboard/charts_produits';">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <!-- small card -->
                <div class="small-box text-white" style="background-color: #170d7b;">
                <div class="inner">
                    <h3> {{ App\Models\Produit::count()}}</h3>

                    <p>Produits Total</p>
                </div>
                <div class="icon">
                    <i class="fas fa-barcode text-white"></i>
                </div>
              
                </div>
            </div>
          </div>

        <div class="col-sm-4 ">
            <div class="col-md-12 col-sm-12 col-12 ">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>@if($promation_produits == 0) Aucun @else {{$promation_produits}} @endif</h3>

                        <p>Produits en Promotions</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie text-white"></i>
                    </div>
                </div>
            </div>
        </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>


    @livewire('live-produit')


    </div>
@endsection