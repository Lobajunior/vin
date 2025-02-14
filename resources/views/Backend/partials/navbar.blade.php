 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Accueil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
</nav>
  <!-- /.navbar -->
@if(Auth::user()->role == "SuperAdmin")
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar  sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard/home" class="brand-link">
      <img src="{{ asset('../Backend/dist/img/Jiam_s4-removebg-preview.png') }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">@if(App\Models\User::where('role','Entreprise')->first()) {{ App\Models\User::where('role','Entreprise')->first()->nom }} {{ App\Models\User::where('role','Entreprise')->first()->prenom }} @endif</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::asset('../Backend/images/User/'.Auth::user()->photo) }}" class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->prenom}} {{Auth::user()->nom  }}</a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="/dashboard/home" class="nav-link {{ Request::is('dashboard/home') ? 'active': ' ' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ Request::is('dashboard/categorie') || Request::is('dashboard/sous_categorie') || Request::is('dashboard/produits') ? 'active': ' ' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Parametres Systemes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dashboard/categorie" class="nav-link {{ Request::is('dashboard/categorie') ? 'active': ' ' }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/sous_categorie" class="nav-link {{ Request::is('dashboard/sous_categorie') ? 'active': ' ' }}">
                   <i class="nav-icon fas fa-th"></i>
                  <p>Sous_Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboard/produits" class="nav-link {{ Request::is('dashboard/produits') ? 'active': ' ' }}">
                  <i class="fas fa-barcode nav-icon"></i>
                  <p>Produits</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Humans</li>
          <li class="nav-item">
            <a href="/dashboard/Utilisateurs" class="nav-link {{ Request::is('dashboard/Utilisateurs') ? 'active': ' ' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Utilisateurs
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/notre_equipe" class="nav-link {{ Request::is('dashboard/notre_equipe') ? 'active': ' ' }}">
              <i class="nav-icon far fa-image"></i>
              <p>
                Notre Equipe
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/commandes" class="nav-link {{ Request::is('dashboard/commandes') ? 'active': ' ' }}">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Nos Commandes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/livreurs" class="nav-link {{ Request::is('dashboard/livreurs') ? 'active': ' ' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Mes livreurs
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Messages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Composer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Infos Site</li>
          <li class="nav-item">
            <a href="/dashboard/Profile_Entreprise" class="nav-link {{ Request::is('dashboard/Profile_Entreprise') ? 'active': ' ' }}">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Profile Entreprise</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/a_propos" class="nav-link {{ Request::is('dashboard/a_propos') ? 'active': ' ' }}">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>A propos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/partenaire" class="nav-link {{ Request::is('dashboard/partenaire') ? 'active': ' ' }}">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Partenaires</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/slide" class="nav-link {{ Request::is('dashboard/slide') ? 'active': ' ' }}">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Slides</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/blog" class="nav-link {{ Request::is('/dashboard/blog') ? 'active': ' ' }}">
              <i class="nav-icon fas fa-file"></i>
              <p>Blog</p>
            </a>
          </li>
          <li class="nav-header">Parametres</li>
          <li class="nav-item">
            <a href="/dashboard/Profile_Utilisateur" class="nav-link {{ Request::is('dashboard/Profile_Utilisateur') ? 'active': ' ' }}">
              <i class="nav-icon far fa-circle text-info"></i>
              <p class="text">Infos Personnelles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>Deconnexion</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@elseif(Auth::user()->role == "Livreurs")
<!-- Main Sidebar Container -->
  <aside class="main-sidebar  sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard/home" class="brand-link">
      <img src="{{ asset('../Backend/dist/img/Jiam_s4-removebg-preview.png') }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SELON TOI 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::asset('../Backend/images/User/'.Auth::user()->photo) }}" class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->prenom}} {{Auth::user()->nom}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="/dashboard/home" class="nav-link {{ Request::is('dashboard/home') ? 'active': ' ' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/commandes_livreurs" class="nav-link {{ Request::is('dashboard/commandes_livreurs') ? 'active': ' ' }}">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Mes Commandes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/Profile_Utilisateur" class="nav-link {{ Request::is('dashboard/Profile_Utilisateur') ? 'active': ' ' }}">
              <i class="nav-icon far fa-circle text-info"></i>
              <p class="text">Infos Personnelles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>Deconnexion</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@endif