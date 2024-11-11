@extends('../Backend/layouts/app')


@section('title')
    Detail commandes : {{$commande->code}}
@endsection


@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Details Commande</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard/home">Dashboard</a></li>
              <li class="breadcrumb-item active">commande</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
                Cette page vous permettra d'avoir tous les details necessaire sur la commande cible
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> @if(!is_null(App\Models\User::where('role','Entreprise')->first())) {{ App\Models\User::where('role','Entreprise')->first()->nom }} {{ App\Models\User::where('role','Entreprise')->first()->prenom }}  @endif
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              @if($commande->status == 0 )
              <div class="ribbon-wrapper ribbon-lg">
                <div class="ribbon bg-danger text-lg">
                  En attente
                </div>
              </div>
              @else
              <div class="ribbon-wrapper ribbon-lg">
                <div class="ribbon bg-success text-lg">
                  Terminer
                </div>
              </div>
              @endif
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    @if($commande->user_id != NULL)
                        <strong>{{ App\Models\User::where('id',$commande->user_id)->first()->nom }} {{ App\Models\User::where('id',$commande->user_id)->first()->prenom }}</strong><br>
                        {{ App\Models\User::where('id',$commande->user_id)->first()->adresse }}<br>
                        Ville: {{ App\Models\User::where('id',$commande->user_id)->first()->villes }}<br>
                        Phone: (+225) {{ App\Models\User::where('id',$commande->user_id)->first()->phone }}<br>
                        Email: {{ App\Models\User::where('id',$commande->user_id)->first()->email }}
                    @endif
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                Livreur associer
                  <address>
                    <strong>John Doe</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (555) 539-1037<br>
                    Email: john.doe@example.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                <b>Invoice #{{$commande->code}}</b><br>
                <br>
                <b>Order ID:</b> {{$commande->id}}<br>
                <b>Lieu de livraison:</b> {{$commande->destination}}<br>
                <b>Etat de la commande:</b> {{$commande->status == 0 ? 'En attente' : 'Terminer'}}<br>
                <b>Date: {{$commande->date}}<br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                        <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Quantité </th>
                                <th>prix unitaire</th>
                                <th>total</th>
                                </tr>
                            </thead>
                            @if(!is_null($produit_of_order) && $produit_of_order->count() > 0 )
                            <tbody>
                                @for($x = 0 ; $x < $produit_of_order->count(); $x++)
                                <tr>
                                    <td>{{$x + 1}}</td>
                                    <td>{{$produit_of_order[$x]->libelle}}</td>
                                    <td>{{$produit_of_order[$x]->qte}}</td>
                                    <td>{{$produit_of_order[$x]->prix}}</td>
                                    <td>{{number_format($produit_of_order[$x]->prix_prodcom * $produit_of_order[$x]->qte,0,',','.')}} XOF</td>
                                </tr>
                                @endfor
                            </tbody>
                            @endif
                        </table>
                        </div>
                        <!-- /.col -->
                </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    {{$commande->details}}
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount  {{$commande->date}}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{number_format($commande->prix_total,0,',','.')}}</td>
                      </tr>
                      <!-- <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr> -->
                      <tr>
                        <th>Total:</th>
                        <td>{{number_format($commande->prix_total,0,',','.')}} FCFA</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                @if($commande->status == 0) <button type="button" onclick="location.href = '/dashboard/checked_order/{{$commande->slug}}';" class="btn btn-success float-right"><i class="far fa-check-circle"></i> Terminer la commande @endif
                </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



    </div>
@endsection