@extends('../Frontend/layouts/app')


@section('title')
    Accueil
@endsection


@section('content')


 <!-- Home Section Start -->
    <section class="home-section-2 home-section-bg pt-0 overflow-hidden">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="slider-1 slider-animate  product-wrapper text-white">
                        <div>
                            <div class="home-contain rounded-0 p-5">
                                <img src="{{ asset('../Frontend/assets/images/slide1.webp') }}"
                                    class="img-fluid bg-img blur-up lazyload" alt="image de bannière 1">
                                <div class="home-detail home-big-space p-center-left home-overlay position-relative">
                                    <div class="container-fluid-lg">
                                        <div>
                                            <h6 class="ls-expanded theme-color text-uppercase">OFFRE SPÉCIALE DU WEEK-END
                                            </h6>
                                            <h1 class="heding-2 text-danger">Produits,Qualité Superieure</h1>
                                            <h2 class="content-2">Simplicité, rapidité, facilité d'accès</h2>
                                            </h5>
                                            <button
                                                class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto"
                                                onclick="location.href = 'shop-left-sidebar.html';">Achetez maintenant<i
                                                    class="fa-solid fa-arrow-right icon"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div>
                            <div class="home-contain rounded-0 p-5 " >
                                <img src="{{ asset('../Frontend/assets/images/slide2.jpg') }}"
                                    class="img-fluid bg-img blur-up lazyload" alt="image de bannière 2">
                                <div class="home-detail home-big-space p-center-left home-overlay position-relative">
                                    <div class="container-fluid-lg">
                                        <div>
                                            <h6 class="ls-expanded theme-color text-uppercase"> SPÉCIALE DU WEEK-END
                                            </h6>
                                            <h1 class="heding-2">Produits  Superieure</h1>
                                            <h2 class="content-2">Simplicité, rapidité,  d'accès</h2>

                                            </h5>
                                            <button
                                                class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto"
                                                onclick="location.href = 'shop-left-sidebar.html';">Achetez maintenant<i
                                                    class="fa-solid fa-arrow-right icon"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="home-contain rounded-0 p-5 " >
                                <img src="{{ asset('../Frontend/assets/images/slide3.jpg') }}"
                                    class="img-fluid bg-img blur-up lazyload" alt="image de bannière 2">
                                <div class="home-detail home-big-space p-center-left home-overlay position-relative">
                                    <div class="container-fluid-lg">
                                        <div>
                                            <h6 class="ls-expanded theme-color text-uppercase"> SPÉCIALE DU WEEK-END
                                            </h6>
                                            <h1 class="heding-2">Produits  Superieure</h1>
                                            <h2 class="content-2">Simplicité, rapidité,  d'accès</h2>

                                            </h5>
                                            <button
                                                class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto"
                                                onclick="location.href = 'shop-left-sidebar.html';">Achetez maintenant<i
                                                    class="fa-solid fa-arrow-right icon"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Section End -->


  <!-- Category Section Start -->
    

            <livewire:frontend.accueil.live-categorie />

     
    <!-- Category Section End -->



    <!-- Top Selling Section Start -->
    <section class="top-selling-section">
        <div class="container-fluid-lg">
            <div class="slider-4-1">
                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Meilleures ventes</h3>
                                </div>

                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="../Frontend/assets/images/veg-2/top-selling/liqueur2.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Plantation Rum - XO 20th Anniversary - en Etui</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>75.000 Fcfa</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.05s">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="../Frontend/assets/images/veg-2/top-selling/liqueur1.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Don Papa - 7 Ans - en Etui</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6>90.000 Fcfa</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.1s">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="../Frontend/assets/images/veg-2/top-selling/liqueur3.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Tequila Don Julio Reposado - en Etui </h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6> 45.000 Fcfa</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeIn" data-wow-delay="0.15s">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="../Frontend/assets/images/veg-2/top-selling/liqueur4.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Tequila Don Julio 1942 - en Etui</h5>
                                        </a>
                                        <div class="product-rating">
                                            <ul class="rating">
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star" class="fill"></i>
                                                </li>
                                                <li>
                                                    <i data-feather="star"></i>
                                                </li>
                                            </ul>
                                            <span>(34)</span>
                                        </div>
                                        <h6> 70.000 Fcfa</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <livewire:frontend.accueil.liveproduit-tendance />


                    <livewire:frontend.accueil.live-recent />


                    <livewire:frontend.accueil.live-best-review />
            </div>
        </div>
    </section>
    <!-- Top Selling Section End -->

    <!-- More ASK -->

                    <livewire:frontend.accueil.live-more-ask />
    <!--END  More ASK -->






     <!-- Product offre de la semaine Start -->

           <livewire:frontend.accueil.live-offer-week />

    <!-- Product offre de la semaine End -->


   <!-- Product Electromenager Start -->

                            <livewire:frontend.accueil.live-electromenager />

    <!-- Product Electromenager End -->




     <!-- meilleurs catégorie -->

                  <livewire:frontend.accueil.live-best-categorie />

    <!-- Product Section End -->



    <livewire:frontend.accueil.live-djassa />




    <livewire:frontend.accueil.live-reductionsoixantedix />



        <!-- Speciale Homme -->
                      <livewire:frontend.accueil.live-speciale-homme />
                    
    <!-- Produuits Mode homme End -->



        <!-- Mode Femmes -->
                            <livewire:frontend.accueil.live-speciale-lady />
                   
    <!-- Produuits Mode femme End -->





       <!-- Product Section Start -->
       <section>
        <div class="container-fluid-lg">
            <div class="row g-3">
                <div class="col-xxl-9 col-xl-8">
                    <div class="title title-flex">
                        <div>
                            <h2>Ma Biere</h2>
                            <span class="title-leaf">
                                <svg class="icon-width">
                                    <use xlink:href="../Frontend/assets/svg/leaf.svg#cake"></use>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <!-- Enfants start -->
                    <div class="product-box-slider-2 no-arrow">

                       <livewire:frontend.accueil.live-enfants />

                    </div>
                    <!-- Enfants End -->

                    <div class="title section-t-space">
                        <h2>Tout type de chamagne Luxueux</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="../Frontend/assets/svg/leaf.svg#cake"></use>
                            </svg>
                        </span>
                    </div>

                    <!-- Tout type d'accessoire start -->
                    <div class="row row-cols-xxl-4 row-cols-md-3 row-cols-sm-2 row-cols-2 g-sm-4 g-3 no-arrow mt-3 mb-2">


                       <livewire:frontend.accueil.live-accessoire />

                    </div>
                    <!-- Tout type d'accessoire end -->

                </div>

                <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
                    <div class="position-sticky top-0">
                        <div class="ratio_209 rounded wow fadeIn">
                            <div class="banner-contain-2 rounded hover-effect">
                                <img src="../Frontend/assets/images/cake/banner/pub3.png" class="bg-img blur-up lazyload" alt="image de publiciyé">
                                <div class="banner-detail p-top-left">
                                    <div>
                                        <h6 class="text-uppercase theme-color fw-500 text-danger">Affichez-vous ici </h6>
                                        <h3 class="text-uppercase text-white">
                                            Disponible <span class="brand-name">Publicité</span>
                                        </h3>
                                        <p class="text-content fw-500 mt-3 lh-lg text-white">Découvrez l'innovation qui simplifie votre quotidien et améliore votre vie, dès aujourd'hui !</p>

                                        <div class="banner-detail-box banner-detail-box-2 mb-md-3 mb-1 text-white">
                                            <h4 class="text-uppercase text-white">Nous sommes en promo</h4>
                                            <h2 class="mt-2 text-danger">50% de reduction</h2>
                                            <h3 class="text-uppercase">Ouvert</h3>
                                        </div>

                                        <div>
                                            <button onclick="location.href = 'shop-left-sidebar.html';"
                                                class="btn text-white btn-md mt-xxl-4 mt-2 home-button mend-auto theme-bg-color">Contactez
                                                <i class="fa-solid fa-right-long icon ms-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->



@endsection
