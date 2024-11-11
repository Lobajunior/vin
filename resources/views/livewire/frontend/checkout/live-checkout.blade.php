<div class="row g-sm-4 g-3">
                <div class="col-lg-8">
                    <div class="left-sidebar-checkout">
                        <div class="checkout-detail-box">
                            <ul>
                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                            trigger="loop-on-hover"
                                            colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                            class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Adresse de Livraison</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="row g-4">
                                                <div class="col-xxl-6 col-lg-12 col-md-6">
                                                    <div class="delivery-address-box">
                                                        <div>
                                                            

                                                            <div class="label">
                                                                <label>Maison</label>
                                                            </div>

                                                            <ul class="delivery-address-detail">
                                                                <li>
                                                                    <h4 class="fw-500 text-dark">{{Auth::user()->prenom}} {{Auth::user()->nom}}</h4>
                                                                </li>

                                                                <li>
                                                                    <div class="mb-3 coupon-box input-group">
                                                                        <input type="text" class="form-control @error('adresse') is-invalid @enderror is-valid" wire:model="adresse" 
                                                                            placeholder="Entrer votre Adresse de livraison...">
                                                                    </div>
                                                                </li>

                                                                <li>
                                                                    <div class="mb-3 coupon-box input-group">
                                                                        <input type="number" class="form-control @error('contact') is-invalid @enderror " wire:model="contact"
                                                                            placeholder="numero de telephone...">
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                               
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/oaflahpk.json"
                                            trigger="loop-on-hover" colors="primary:#0baf9a" class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Option de Livraison</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="row g-4">
                                                <div class="col-xxl-6">
                                                    <div class="delivery-option">
                                                        <div class="delivery-category">
                                                            <div class="shipment-detail">
                                                                <div
                                                                    class="form-check custom-form-check hide-check-box">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="standard" wire:model="selectLivraison" value="immediate" checked>
                                                                    <label class="form-check-label"
                                                                        for="standard">Livraison immédiate
                                                                        </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xxl-6">
                                                    <div class="delivery-option">
                                                        <div class="delivery-category">
                                                            <div class="shipment-detail">
                                                                <div
                                                                    class="form-check mb-0 custom-form-check show-box-checked">
                                                                    <input class="form-check-input" wire:model="selectLivraison" value="after" type="radio"
                                                                        name="standard" >
                                                                    <label class="form-check-label" for="future">Livraison dans une heure
                                                                        </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                               
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                            trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                            class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box">
                                        <div class="checkout-title">
                                            <h4>Options de Paiement</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="accordion accordion-flush custom-accordion"
                                                id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingFour">
                                                        <div class="accordion-button collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseFour">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="cash"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="flexRadioDefault" wire:model="selectMethodPaiement" value="cash" checked> Cash
                                                                    a la livraison</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseFour"
                                                        class="accordion-collapse collapse show"
                                                        data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <p class="cod-review">Pay digitally with SMS Pay
                                                                Link. Cash may not be accepted in COVID restricted
                                                                areas. <a href="javascript:void(0)">Know more.</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingOne">
                                                        <div class="accordion-button collapsed"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapseOne">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="credit"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="flexRadioDefault" wire:model="selectMethodPaiement" value="mobilemoney">
                                                                    Mobile Money</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="right-side-summery-box">
                        <div class="summery-box-2">
                            <div class="summery-header">
                                <h3>Mon Panier</h3>
                            </div>

                            <ul class="summery-contain">
                            @if(Cart::content() && Cart::Content()->count() > 0)
                                @foreach(Cart::content() as $cart)
                                <li>
                                    <img src="{{URL::asset('../Backend/images/Produit/'.$cart->options->image)}}"
                                        class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                    <h4>{{ \Illuminate\Support\Str::words($cart->name,2,'...') }} <span>X {{$cart->qty}}</span></h4>
                                    <h4 class="price">{{number_format($cart->price * $cart->qty,0,',','.')}} F</h4>
                                </li>
                                @endforeach
                                @else
                                <li>
                                    <h6 class="text-center text-warning"> Aucun produit dans votre panier</h6>
                                </li>
                                @endif
                            </ul>

                            <ul class="summery-total">
                                <li>
                                    <h4>Prix total (HTT)</h4>
                                    <h4 class="price">{{Cart::subtotal()}} F</h4>
                                </li>

                                <li>
                                    <h4>Tax</h4>
                                    <h4 class="price">{{Cart::tax()}}</h4>
                                </li>

                                <li>
                                    <h4>Coupon/Code</h4>
                                    <h4 class="price">0.00</h4>
                                </li>

                                <li class="list-total">
                                    <h4>Total (FCFA)</h4>
                                    <h4 class="price">{{Cart::subtotal()}}</h4>
                                </li>
                            </ul>
                        </div>

                        <div class="checkout-offer">
                            <div class="offer-title">
                                <div class="offer-icon">
                                    <img src="../assets/images/inner-page/offer.svg" class="img-fluid" alt="">
                                </div>
                                <div class="offer-name">
                                    <h6>Avis aux Clients</h6>
                                </div>
                            </div>

                            <ul class="offer-detail">
                                <li>
                                    <p>Services Call-center: +225 0747663699</p>
                                </li>
                                <li>
                                    <p>combo: Royal Cashew Californian, Extra Bold 100 gm + BB Royal Honey 500 gm</p>
                                </li>
                            </ul>
                        </div>

                        <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold" wire:click="commander">Commander</button>
                    </div>
                </div>




                <div class="modal location-modal fade theme-modal" wire:ignore.self id="invoiceRecu" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down" style="max-width:1000px!important;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" >Reçu de Commande</h5>
                            </div>
                            <div class="modal-body">
                                
                                    <section class="theme-invoice-2" style="padding-top: 0px!important">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xxl-10 col-xl-10 mx-auto my-3">
                                                    @if(isset($ItemcommandeRecu) && $ItemcommandeRecu->count() > 0)
                                                    <div class="invoice-wrapper">
                                                        <div class="invoice-header">
                                                            <div class="header-contain">
                                                                <div class="header-left">
                                                                    <img src="../Frontend/assets/images/logo.svg" alt="">
                                                                </div>
                                                                <div class="header-right">
                                                                    <h3>Commande </h3>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="invoice-body">
                                                            <div class="top-sec">
                                                                <div class="address-detail">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="details-box">
                                                                                <div class="address-box">
                                                                                    <ul>
                                                                                        <li>destination</li>
                                                                                        
                                                                                    </ul>
                                                                                </div>

                                                                                <div class="address-box">
                                                                                    <ul>
                                                                                        <li class="theme-color">Issue Date : <span
                                                                                                class="text-content">20
                                                                                                March, 2022</span></li>
                                                                                        <li class="theme-color">Invoice No : <span
                                                                                                class="text-content">904679</span></li>
                                                                                        <li class="theme-color">Email : <span
                                                                                                class="text-content">user@gmail.com</span></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                            <div class="table-responsive table-borderless">
                                                                <table class="table mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No.</th>
                                                                            <th class="text-start">Item detail</th>
                                                                            <th>Qty</th>
                                                                            <th>Price</th>
                                                                            <th>Amout</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($ItemcommandeRecu as $item)
                                                                        <tr>
                                                                            <td class="text-content">1</td>
                                                                            <td>
                                                                                <ul class="table-details">
                                                                                    <li class="text-title">{{$item->libelle}}</li>
                                                                                    
                                                                                </ul>
                                                                            </td>
                                                                            <td>{{$item->qte}}</td>
                                                                            <td>{{$item->prix}} F</td>
                                                                            <td> {{number_format($item->PCprice,0,',','.')}} F</td>
                                                                        </tr>
                                                                        @endforeach
                                                                        
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <td colspan="5">
                                                                                <ul class="table-price">
                                                                                    <li>GRAND TOTAL</li>
                                                                                    <li class="theme-color">{{number_format($ItemcommandeRecu->sum('PCprice'),0,',','.')}} FCFA</li>
                                                                                </ul>
                                                                            </td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>

                                                        <div class="invoice-footer pt-0">
                                                            <div class="button-group">
                                                                <ul>
                                                                    <li>
                                                                        <button class="btn theme-bg-color text-white rounded"
                                                                            onclick="window.print();">Export As PDF</button>
                                                                    </li>
                                                                    <li>
                                                                        <button class="btn text-white print-button rounded ms-2"
                                                                            onclick="window.print();">Print</button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                
                            </div>
                        </div>
                    </div>
                </div>


</div>