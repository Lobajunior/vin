<!-- Header Start -->
    <header class="pb-md-4 pb-0">
        <div class="header-top">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-xxl-3 d-xxl-block d-none">
                        <div class="top-left-header">
                            <i class="iconly-Location icli text-white"></i>
                            <span class="text-white">Abidjan CI , Rivera palmeraie</span>
                        </div>
                    </div>

                    <div class="col-xxl-6 col-lg-9 d-lg-block d-none  ">
                        <div class="header-offer">
                            <div class="notification-slider">
                                <div>
                                    <div class="timer-notification text-dark">
                                        <h6><strong class="me-1">Bienvenue Chez Teinte Ebene</strong>Révélez votre beauté naturelle avec des soins cosmétiques innovants <br> qui subliment votre peau et illuminent chaque instant

                                        </h6>
                                    </div>
                                </div>

                                <div>
                                    <div class="timer-notification text-dark">
                                        <h6>Quelque chose que vous aimez est maintenant en vente!
                                            <a href="shop-left-sidebar.html" class="text-dark">Achetez
                                                !</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <ul class="about-list right-nav-about">
                            <li class="right-nav-list">
                                <div class="dropdown theme-form-select">
                                    @auth
                                    <button class="btn dropdown-toggle" type="button" id="select-language"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img @auth src="{{ asset('Backend/images/User/'.auth()->user()->photo )}}"@endauth
                                            class="img-fluid blur-up lazyload" alt="">
                                        <span>{{ auth()->user()->prenom }}</span>
                                    </button>
                                    @endauth
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="select-language">

                                        <li>
                                            <a class="dropdown-item" href="{{ route('user_dashboard_index') }}" id="france">
                                            <i
                                                    class="img-fluid fas fa-user mr-2" > </i>
                                                <span>Mon profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/logout" id="chinese">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out mr-2">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                                <span>déconnexion</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="top-nav top-header sticky-header">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="navbar-top">
                            <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <span class="navbar-toggler-icon">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                            </button>
                            <a href="/" class="web-logo nav-logo" width="30px";>
                                <img src="../Frontend/assets/images/logo vin.jpg"  class="img-fluid blur-up lazyload" alt="image du logo">
                            </a>

                            <div class="middle-box">

                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Je recherche des appareils/vetements/categories"
                                            aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn" type="button" id="button-addon2">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="rightside-box">
                                <div class="search-full">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                        <input type="text" class="form-control search-type" placeholder="Search here..">
                                        <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                    </div>
                                </div>
                                <ul class="right-side-menu">
                                    <li class="right-side">
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <div class="search-box">
                                                    <i data-feather="search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="right-side">
                                        <a href="tel:0758293571" class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="phone-call"></i>
                                            </div>
                                            <div class="delivery-detail">
                                                <h6>24/7 Livraison</h6>
                                                <h5>+225 075 829 3571</h5>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="right-side">
                                        <a href="{{ route('favoris_index') }}" class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                    <li class="right-side">
                                        <div class="onhover-dropdown header-badge">
                                            <button type="button" class="btn p-0 position-relative header-wishlist">
                                                <i data-feather="shopping-cart"></i>
                                                <livewire:frontend.panier.number-badge />
                                            </button>

                                            <livewire:frontend.navbar.popup-panier />
                                        </div>
                                    </li>
                                    <li class="right-side onhover-dropdown">
                                    <a href="{{ route('user_dashboard_index') }}">
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                            <div class="delivery-detail">
                                                <h6>Hello,</h6>

                                            </div>
                                        </div>
                                    </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="header-nav">
                        <div class="header-nav-left">
                            <button class="dropdown-category">
                                <i data-feather="align-left"></i>
                                <span>Toutes Categories</span>
                            </button>

                            <div class="category-dropdown">
                                <div class="category-title">
                                    <h5>Categories</h5>
                                    <button type="button" class="btn p-0 close-button text-content">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>

                                    <livewire:frontend.navbar.list-categorie />


                            </div>
                        </div>

                        <div class="header-nav-middle">
                            <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                                <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                    <div class="offcanvas-header navbar-shadow">
                                        <h5>Menu</h5>
                                        <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <ul class="navbar-nav">
                                            <li class="nav-item ">
                                                <a class="nav-link " href="/"
                                                  style="font-size:18px; font-weight: 700;"  >Accueil</a>
                                            </li>

                                            <li class="nav-item ">
                                                <a class="nav-link " href="{{ route('achetez_index') }}"
                                                   style="font-size:18px; font-weight: 700;" >Achetez</a>
                                            </li>

                                            <li class="nav-item ">
                                                <a class="nav-link " href="{{ route('produits_index') }}"
                                                   style="font-size:18px; font-weight: 700;" >Produits</a>
                                            </li>



                                            {{-- <li class="nav-item ">
                                                <a class="nav-link " href="{{ route('blog_index') }}"
                                                    style="font-size:18px; font-weight: 700;" >Blog</a>

                                            </li>

                                            <li class="nav-item  new-nav-item">
                                                <label class="new-dropdown">New</label>
                                                <a class="nav-link " href="{{ route('a_propos_index') }}"
                                                  style="font-size:18px; font-weight: 700;"  >About</a>
                                            </li> --}}

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="header-nav-right">
                            <button class="btn deal-button" data-bs-toggle="modal" data-bs-target="#deal-box">
                                <i data-feather="zap"></i>
                                <span>Deal du jour</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="mobile-category">
                <a href="javascript:void(0)">
                    <i class="iconly-Category icli js-link"></i>
                    <span>Category</span>
                </a>
            </li>


            <li>
                <a href="search.html" class="search-box">
                    <i class="iconly-Search icli"></i>
                    <span>Search</span>
                </a>
            </li>

            <li class="{{ Request::is('ind') ? 'active': ''}}">
                <a href="/">
                    <i class="iconly-Home icli"></i>
                    <span>Acuueil</span>
                </a>
            </li>


            <li class="{{ Request::is('mes_favoris') ? 'active': ''}}">
                <a href="/mes_favoris">
                    <i class="iconly-Heart icli"></i>
                    <span>Favoris</span>
                </a>
            </li>

            <li>
                <a href="{{ route('panier_index') }}">
                    <i class="iconly-Bag-2 icli fly-cate"></i>
                    <span>Panier</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->
