@extends('../Backend/layouts/app')


@section('title')
    Commandes
@endsection


@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header" style="padding: 3px 0.5rem;">
      <div class="container-fluid">
        <div class="row ">

          <div class="col-sm-4 ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <!-- small card -->
                <div class="small-box text-dark" style="background-color: #f5f5f5;">
                <div class="inner">
                    <h3>{{ App\Models\Commande::count()}}</h3>

                    <p>Commandes Total</p>
                </div>
                <div class="icon">
                    <i class="fas fa-cart-plus text-info"></i>
                </div>
              
                </div>
            </div>
          </div>

          <div class="col-sm-4 ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <!-- small card -->
                <div class="small-box text-dark" style="background-color: #f5f5f5;">
                <div class="inner">
                    <h3>{{ App\Models\Commande::where('status',1)->count()}}</h3>

                    <p>Commandes Terminer</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check text-success"></i>
                </div>
              
                </div>
            </div>
          </div>

          <div class="col-sm-4 ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <!-- small card -->
                <div class="small-box text-dark" style="background-color: #f5e6e6;">
                <div class="inner">
                    <h3>{{ App\Models\Commande::where('status',0)->count()}}</h3>

                    <p>Commandes en attente</p>
                </div>
                <div class="icon">
                    <i class="fas fa-ban text-danger"></i>
                </div>
              
                </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <livewire:live-commande />


    </div>


@endsection