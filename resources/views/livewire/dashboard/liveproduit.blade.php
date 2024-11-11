<div>
     <!-- PRODUCT LIST -->
     <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Produits recemment ajouter </h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    @foreach($produit as $produits)
                    <li class="item">
                      <div class="product-img">
                        @if(!is_null($produits->photo))
                        <img src="../Backend/images/Produit/{{$produits->photo}}" alt="Product Image" class="img-size-50">
                        @else
                        <img src="../Backend/dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        @endif
                      </div>
                      <div class="product-info">
                        @foreach($produits->souscategorie()->get() as $subcat)
                        <a href="javascript:void(0)" class="product-title">{{$subcat->libelle}}
                            @endforeach
                          <span class="badge badge-warning float-right">{{$produits->prix}} FCFA</span></a>
                        <span class="product-description">
                          {{$produits->libelle}}
                        </span>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="/dashboard/produits" class="uppercase">Voir tous les produits</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
</div>
