<div>
    <div class="row pt-3" style="background-color: #fff;">
        <div class="col-sm-4 ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <!-- small card -->
                <div class="small-box text-dark" style="background-color: #f5f5f5;">
                <div class="inner">
                    <h3> <span style="color: #91a449;"> {{number_format(App\Models\Commande::sum('prix_total'),0,',',' ')}}</span> FCFA</h3>

                    <p>Gain à obtenir</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign text-dark"></i>
                </div>
                
                </div>
            </div>
        </div>

        <div class="col-sm-4 ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <!-- small card -->
                <div class="small-box text-dark" style="background-color: #e3f5e5;">
                <div class="inner">
                    <h3> <span style="color: #91a449;"> {{number_format(App\Models\Commande::where('status',1)->sum('prix_total'),0,',',' ')}}</span> FCFA</h3>

                    <p>Gain obtenu</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle text-dark"></i>
                </div>
                
                </div>
            </div>
        </div>

        <div class="col-sm-4 ">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <!-- small card -->
                <div class="small-box text-dark" style="background-color: #f7f7f7;">
                <div class="inner">
                    <h3> <span style="color: #91a449;"> {{number_format(App\Models\Commande::where('status',1)->whereRaw("DATE_FORMAT(created_at,'%Y-%m') = ?",Illuminate\Support\Carbon::now()->format('Y-m'))->sum('prix_total'),0,',',' ')}}</span> FCFA</h3>

                    <p>Gain du mois</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-alt text-dark"></i>
                </div>
                
                </div>
            </div>
        </div>
    </div>

    <div class="content-header">
        <div class="container-fluid">

            @if($show_filter_date == False && $show_filter_montant == False)
            <button type="button" wire:click="set_show_filter_date" class="btn"  style="background-color: #170d7b; color: #fff;"> Filtrez par date <i class="fas fa-calendar"> </i></button>
            <button type="button" wire:click="set_show_filter_montant" class="btn"  style="background-color: #170d7b; color: #fff;"> Filtrez par montant <i class="fas fa-filter"> </i> </button>
            @else
            <button type="button" wire:click="reset_show_filter" class="btn"  style="background-color: #dc3545; color: #fff;"> fermer <i class="far fa-times-circle ml-1"> </i> </button>
            @endif

            @if($show_filter_date == True)
            <div class="row">
                <!-- <span class="">Filtrer les commandes dans un intervale de date</span> -->
                <div class="col-lg-6 col-md-6">
                    <form wire:submit.prevent="filter_order_by_date">
                        @csrf
                        <label >Veuillez selectionner un interval de date </label>

                        <div class="row">
                            <div class="col-4">
                                <input type="date" class="form-control" wire:model="datedebutSelect"  min="2020" max="2050"> 
                            </div>
                            <div class="col-4">
                                <input type="date" class="form-control" wire:model="datefinSelect"  min="2020" max="2050">
                            </div>
                        
                            <div class="col-4">
                                <button type="submit" class="btn btn-info"> Filtrer</button>
                            </div>
                        </div>  
                    </form >
                </div>
            </div>
            @endif
            @if($show_filter_montant == True)
            <div class="col-lg-6 col-md-6">
                    <form wire:submit.prevent="filter_order_by_price">
                        @csrf
                        <label >Veuillez selectionner le prix compris </label>

                        <div class="row">
                            <div class="col-4">
                                <input type="number" class="form-control" wire:model="prixdebutSelect"  min="0"> 
                            </div>
                            <div class="col-4">
                                <input type="number" class="form-control" wire:model="prixfinSelect"  min="0">
                            </div>
                        
                            <div class="col-4">
                                <button type="submit" class="btn btn-info"> Filtrer</button>
                            </div>
                        </div>  
                    </form >
                </div>
            @endif
        </div>
    </div>

    <!-- /.row -->
    <div class="row" style="padding: 1%!important;">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
                

            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" wire:model="search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                    </button>
                </div>
                </div>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>CODE</th>
                    <th>Destination</th>
                    <th>Utilisateurs</th>
                    <th>Conctact</th>
                    <th>montant</th>
                    <th>etat</th>
                    <th>date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($commandes as $item)
                <tr>
                    <td>{{$item->code}}</td>
                    <td>{{$item->destination}}</td>
                    @if(!is_null($item->user()->get()))
                    @foreach($item->user()->get() as $item_user )
                    <td>{{$item_user->prenom}} {{$item_user->nom}}</td>
                    @endforeach
                    @else
                    <td>utilisateur supprimer</td>
                    @endif

                    @if(!is_null($item->user()->get()))
                    @foreach($item->user()->get() as $item_user )
                    <td>{{$item_user->phone}} </td>
                    @endforeach
                    @endif
                    <td>{{number_format($item->prix_total,0,',','.')}} F</td>
                    @if($item->status == 0)
                    <td>
                    <i class="icon fas fa-ban text-danger"></i>
                    </td>
                    @else
                    <td>
                        <i class="nav-icon fas fa-check-circle text-success"></i>
                    </td>
                    @endif
                    <td>{{date('j M, Y', strtotime($item->created_at))}}</td>
                    <td>
                    <div class="timeline-footer">
                        <a class="btn btn-info btn-sm" wire:click="show_more_detail_commande({{$item->id}})"  data-toggle="modal" data-target="#detail_commande" > <i class="fas fa-eye mr-1"></i> details</a>
                        <a class="btn btn-danger btn-sm ml-2" wire:click="deleteOrder({{$item->id}})"> <i class="fas fa-trash mr-1"></i> supprimer</a>
                    </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->








    <!-- Section dedier au modals -->
    <div wire:ignore.self class="modal fade" id="detail_commande">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                        <h4>
                            <i class="fas fa-globe"></i> {{ App\Models\User::where('role','Entreprise')->first()->nom }} {{ App\Models\User::where('role','Entreprise')->first()->prenom }}
                            <small class="float-right">Date: {{$date}}</small>
                        </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                        Destinataire
                        <address>
                            @if($id_user != NULL)
                            <strong>{{ App\Models\User::where('id',$id_user)->first()->nom }} {{ App\Models\User::where('id',$id_user)->first()->prenom }}</strong><br>
                            {{ App\Models\User::where('id',$id_user)->first()->adresse }}<br>
                            Ville: {{ App\Models\User::where('id',$id_user)->first()->villes }}<br>
                            Phone: (+225) {{ App\Models\User::where('id',$id_user)->first()->phone }}<br>
                            Email: {{ App\Models\User::where('id',$id_user)->first()->email }}
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
                        <b>Invoice #{{$code}}</b><br>
                        <br>
                        <b>Order ID:</b> {{$id_com}}<br>
                        <b>Payment Due:</b> None<br>
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
                            @if(!is_null($lis_produit_commander) && $lis_produit_commander->count() > 0 )
                            <tbody>
                                @for($x = 0 ; $x < $lis_produit_commander->count(); $x++)
                                <tr>
                                    <td>{{$x + 1}}</td>
                                    <td>{{$lis_produit_commander[$x]->libelle}}</td>
                                    <td>{{$lis_produit_commander[$x]->qte}}</td>
                                    <td>{{$lis_produit_commander[$x]->prix}}</td>
                                    <td>{{number_format($lis_produit_commander[$x]->prix_prodcom * $lis_produit_commander[$x]->qte,0,',','.')}} F</td>
                                </tr>
                                @endfor
                            </tbody>
                            @endif
                        </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                        @if($etat == 0)
                        <button type="button" wire:click="finish_commande({{$id_com}})" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Terminer la commande
                        </button>
                        @endif
                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Generate PDF
                        </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="button"  onclick="location.href = '/dashboard/details_commande/{{$slug_commande}}';" class="btn" style="background-color: #170d7b; color: #fff;">Plus de details</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</div>
