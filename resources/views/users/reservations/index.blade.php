
<!DOCTYPE html>
<html lang="zxx">

<head>        

        <!-- Meta -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

        <!-- Title -->
        <title>..:: LIBRARIA ::..</title>

        <!-- Favicon -->
        <link href="../../../../assets/img/favicon.ico" rel="icon" type="image/x-icon" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <link href=".../../assets/temp/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Mobile Menu -->
        <link href=".../../assets/temp/css/mmenu.css" rel="stylesheet" type="text/css" />
        <link href=".../../assets/temp/css/mmenu.positioning.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href=".../../assets/temp/css/jquery.accordion.css">

        <!-- Stylesheet -->
        <link href="../../assets/temp/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="../../assets/temp/js/html5shiv.min.js"></script>
        <script src="../../assets/temp/js/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Start: Header Section -->
        <header id="header-v1" class="navbar-wrapper inner-navbar-wrapper">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="navbar-header">
                                    <div class="navbar-brand">
                                        <h1>
                                            <a href="{{route('welcome')}}">
                                                <img src="../../assets/img/libraria-logo-v1.png" alt="LIBRARIA" />
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <!-- Header Topbar -->
                                <div class="header-topbar hidden-sm hidden-xs">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="topbar-info">
                                            <p class="lead">Vous avez trouvé le livre qu’il vous faut ? Réservez-le en un clic !</p>
                                           
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                        <div class="topbar-links">
                                            @if (Route::has('login'))
                                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                                @auth
                                                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                                @else
                                                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                                                @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                                @endif
                                                @endauth
                                            </div>
                                            @endif
                                            <span>|</span>
                                            
                                         
                                        </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-collapse hidden-sm hidden-xs">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown active">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{route('welcome')}}">Home</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('welcome')}}">Home</a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('users.livres.livre_media') }}">Books &amp; Media</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('users.livres.livre_media') }}">Books &amp; Media List View</a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('users.reservations.index') }}">News &amp; Events</a>
                                            <ul class="dropdown-menu">
                                            
                                                <li><a href="{{ route('users.reservations.index') }}">News &amp; Events Detail</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Pages</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('users.reservations.emprunt') }}">Cart</a></li>
                                                <li> <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                                                {{ __('Profile') }}
                                            </x-nav-link></li>
                                            </ul>
                                        </li>
                                        
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-menu hidden-lg hidden-md">
                            <a href="#mobile-menu"><i class="fa fa-navicon"></i></a>
                            <div id="mobile-menu">
                                <ul>
                                    <li class="mobile-title">
                                        <h4>Navigation</h4>
                                        <a href="#" class="close"></a>
                                    </li>
                                    <li>
                                        <a href="{{route('welcome')}}">Home</a>
                                        <ul>
                                            <li><a href="{{route('welcome')}}">Home V1</a></li>
                                            
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('users.livres.livre_media') }}">Books &amp; Media</a>
                                        <ul>
                                            <li><a href="{{ route('users.livres.livre_media') }}">Books &amp; Media List View</a></li>
                                           
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ route('users.reservations.index') }}">News &amp; Events</a>
                                        <ul>
                                            <li><a href="{{ route('users.reservations.index') }}">News &amp; Events Detail</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Pages</a>
                                        <ul>
                                            <li><a href="{{ route('users.reservations.emprunt') }}">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="signin.html">Signin/Register</a></li>
                                            <li><a href="404.html">404/Error</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- End: Header Section -->

        <!-- Start: Page Banner -->
        <section class="page-banner news-listing-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>News Listing</h2>
                    <span class="underline center"></span>
                    <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="{{route('welcome')}}">Home</a></li>
                        <li>News</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End: Page Banner -->

        <!-- Start: Products Section -->
        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <div class="main-news-list">
                        <div class="container">
                            <!-- Start: Search Section -->
                            <section class="search-filters">
                                <div class="filter-box">

                                    <div class="container mt-5" >
                                        <p class="mb-4 text-black">📖 Mes Réservations </p>

                                        @if(session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif

                                        @if($reservations->isEmpty())
                                            <div class="alert alert-info"> Vous n'avez fait aucune réservation pour le moment.</div>
                                        @else
                                            <div class="table-responsive">
                                                <table class="table table-striped text-center align-middle">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Livre</th>
                                                            <th>Date de Réservation</th>
                                                            <th>Statut</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($reservations as $index => $reservation)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $reservation->livre->titre }}</td>
                                                                <td>{{ $reservation->created_at->format('d/m/Y') }}</td>
                                                                <td>
                                                                    @if ($reservation->statut === 'en attente')
                                                                        <span class="badge bg-warning text-dark">En attente</span>
                                                                    @elseif ($reservation->statut === 'confirmée')
                                                                        <span class="badge bg-success">Confirmée</span>
                                                                    @elseif ($reservation->statut === 'annulée')
                                                                        <span class="badge bg-danger">Annulée</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('users.reservations.emprunt') }}" class="btn btn-sm btn-outline-primary">
                                                                        🎫 Voir votre emprunt
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </div>

                                        </div>
                                        
                                </div>
                                <div class="clear"></div>
                            </section>
                            

        
<!-- Start: Footer -->
    <footer class="site-footer">
       
        
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-9 pull-right">
                        
                        <ul>
                            <li><a href="{{ route('welcome')}}">Home</a></li>
                            <li><a href="{{ route('users.livres.livre_media') }}">Books &amp; Media</a></li>
                            <li><a href="{{ route('users.reservations.index') }}">News &amp; Events</a></li>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End: Footer -->
   

        
        <!-- jQuery Latest Version 1.x -->
        <script type="text/javascript" src="../../assets/temp/js/jquery-1.12.4.min.js"></script>
        
        <!-- jQuery UI -->
        <script type="text/javascript" src="../../assets/temp/js/jquery-ui.min.js"></script>
        
        <!-- jQuery Easing -->
        <script type="text/javascript" src="../../assets/temp/js/jquery.easing.1.3.js"></script>

        <!-- Bootstrap -->
        <script type="text/javascript" src="../../assets/temp/js/bootstrap.min.js"></script>
        
        <!-- Mobile Menu -->
        <script type="text/javascript" src="../../assets/temp/js/mmenu.min.js"></script>
        
        <!-- Harvey - State manager for media queries -->
        <script type="text/javascript" src="../../assets/temp/js/harvey.min.js"></script>
        
        <!-- Waypoints - Load Elements on View -->
        <script type="text/javascript" src="../../assets/temp/js/waypoints.min.js"></script>

        <!-- Facts Counter -->
        <script type="text/javascript" src="../../assets/temp/js/facts.counter.min.js"></script>

        <!-- MixItUp - Category Filter -->
        <script type="text/javascript" src="../../assets/temp/js/mixitup.min.js"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="../../assets/temp/js/owl.carousel.min.js"></script>
        
        <!-- Accordion -->
        <script type="text/javascript" src="../../assets/temp/js/accordion.min.js"></script>
        
        <!-- Responsive Tabs -->
        <script type="text/javascript" src="../../assets/temp/js/responsive.tabs.min.js"></script>
        
        <!-- Responsive Table -->
        <script type="text/javascript" src="../../assets/temp/js/responsive.table.min.js"></script>
        
        <!-- Masonry -->
        <script type="text/javascript" src="../../assets/temp/js/masonry.min.js"></script>
        
        <!-- Carousel Swipe -->
        <script type="text/javascript" src="../../assets/temp/js/carousel.swipe.min.js"></script>
        
        <!-- bxSlider -->
        <script type="text/javascript" src="../../assets/temp/js/bxslider.min.js"></script>
        
        <!-- Custom Scripts -->
        <script type="text/javascript" src="../../assets/temp/js/main.js"></script>

    </body>

    
</html>