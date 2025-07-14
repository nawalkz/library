<!DOCTYPE html>
<html lang="zxx">


<head>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

    <!-- Title -->
    <title>..:: LIBRARIA ::..</title>

    <!-- Favicon -->
    <link href="../../assets/img/favicon.ico" rel="icon" type="image/x-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <link href=" ../../assets/temp/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Mobile Menu -->
    <link href=" ../../assets/temp/css/mmenu.css" rel="stylesheet" type="text/css" />
    <link href=" ../../assets/temp/css/mmenu.positioning.css" rel="stylesheet" type="text/css" />

    <!-- Accordion Stylesheet -->
    <link rel="stylesheet" type="text/css" href=" ../../assets/temp/css/jquery.accordion.css">

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
                                        <a href="index-2.html">
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
                                            <span><i class="fa fa-smile-o"></i> Bienvenue à Libraria – votre porte d’entrée vers un monde de lecture!  </span>
                                        </div>

                                    </div>
                                   <div class="col-sm-6">
                                        <div class="topbar-links">
                                            @if (Route::has('login'))
                                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                                @auth
                                                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                                @else
                                                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Se connecter</a>


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
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('welcome')}}">Accueil</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('welcome')}}">Accueil</a></li>

                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('users.livres.livre_media') }}">Livres </a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="{{ route('users.livres.livre_media') }}">Affichage en liste des livres
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('users.reservations.index') }}">Reservation</a>
                                        <ul class="dropdown-menu">

                                            <li><a href="{{ route('users.reservations.index') }}">Informations de réservation</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="#">Pages</a>
                                        <ul class="dropdown-menu">

                                            <li> <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                                                    {{ __('Profile') }}
                                                </x-nav-link></li>

                                            <li><a href="{{ route('users.reservations.emprunt') }}">Emprunt</a></li>

                                        </ul>
                                    </li>

                                    @auth
<li class="nav-item">
    <a class="nav-link" href="{{ route('notifications.index') }}">
        🔔 Notifications
        @if(auth()->user()->unreadNotifications->count() > 0)
            <span class="badge bg-danger">
                {{ auth()->user()->unreadNotifications->count() }}
            </span>
        @endif
    </a>
</li>
@endauth

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
                                    <a href="{{route('welcome')}}">Accueil</a>
                                    <ul>
                                        <li><a href="{{route('welcome')}}">Accueil</a></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('users.livres.livre_media') }}">Livres</a>
                                    <ul>
                                        <li><a href="{{ route('users.livres.livre_media') }}">Affichage en liste des livres
                                            </a></li>

                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('users.reservations.index') }}">Reservation</a>
                                    <ul>
                                        <li><a href="{{ route('users.reservations.index') }}">Informations de réservation</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Pages</a>
                                    <ul>

                                        <li> <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                                                {{ __('Profile') }}
                                            </x-nav-link></li>

                                        <li><a href="{{ route('users.reservations.emprunt') }}">Emprunt</a></li>

                                    </ul>
                                </li>
                                <li>


                                    @auth
                                    <a class="nav-link" href="#">
                                        🔔 Notifications
                                        @if(auth()->user()->unreadNotifications->count() > 0)
                                        <span class="badge bg-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                                        @endif
                                    </a>


                                    <ul>
                                        @foreach(auth()->user()->unreadNotifications as $notification)
                                        <li>
                                            <a href="{{ route('notifications.read', $notification->id) }}">
                                                {{ $notification->data['message'] }}
                                                <small>{{ $notification->created_at->diffForHumans() }}</small>
                                            </a>
                                        </li>
                                        @endforeach

                                        @if(auth()->user()->unreadNotifications->isEmpty())
                                        <li><em>Aucune nouvelle notification</em></li>
                                        @endif
                                    </ul>
                                </li>
                                @endauth
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- End: Header Section -->

    <!-- Start: Page Banner -->
    <section class="page-banner services-banner">
        <div class="container">
            <div class="banner-header">
                <h2>Books </h2>
                <span class="underline center"></span>
               
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('welcome')}}">Accueil</a></li>
                    <li>Livres </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End: Page Banner -->

    <!-- Start: Products Section -->
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <div class="books-media-gird">
                    <div class="container">
                        <div class="row">
                            <!-- Start: Search Section -->
                            <section class="search-filters">
                                <div class="container">
                                    <div class="filter-box">
                                        <div id="livres">
                                            <h3>Qu’aimeriez-vous découvrir à la bibliothèque?</h3>
                                            <form method="GET" class="row g-2 align-items-center">

                                                <!-- Titre (autocomplete) -->
                                                <div class="col-md-3">
                                                    <input type="text" id="titre" class="form-control" placeholder="Rechercher par titre">
                                                    <input type="hidden" name="titre_id" id="titre_id">
                                                </div>

                                                <!-- Auteur (autocomplete) -->
                                                <div class="col-md-3">
                                                    <input type="text" id="auteur" class="form-control" placeholder="Rechercher par auteur">
                                                    <input type="hidden" name="auteur_id" id="auteur_id">
                                                </div>

                                                <!-- Catégorie (select) -->
                                                <div class="col-md-3">
                                                    <select name="categorie_id" class="form-control">
                                                        <option value="">Choisis une catégorie</option>
                                                        @foreach (App\Models\Categorie::all() as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->categorie }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Bouton Search -->
                                                <div class="col-md-2">
                                                    <button type="button" id="search" class="btn btn-primary search-btn rounded w-100">Rechercher </button>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </section>
                            <!-- End: Search Section -->
                        </div>
                        <div class="row">
                            <div class="col-md-9 col-md-push-3">
                                <div class="filter-options margin-list">
                                    <div class="row">


                                        <div class="col-md-3 col-sm-3 pull-right">
                                            <div class="filter-toggle">
                                                <a href="{{ route('users.livres.livre_media') }}" class="active"><i class="glyphicon glyphicon-th-large"></i></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="livres">
                                    @include('users.livres.livre_partial', ['livres' => $livres])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Start: Footer -->
    <footer class="site-footer">


        <div class="sub-footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-9 pull-right">

                        <ul>
                            <li><a href="{{ route('welcome')}}">Accueil</a></li>
                            <li><a href="{{ route('users.livres.livre_media') }}">Livres</a></li>
                            <li><a href="{{ route('users.reservations.index') }}">Reservation</a></li>


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

    <!-- jQuery et jQuery UI (mettre dans layout ou avant </body>) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        $(function() {
            // Titre autocomplete
            $("#titre").autocomplete({
                source: "{{ route('livres.autocomplete.titre') }}",
                minLength: 2,
                select: function(event, ui) {
                    $('#titre_id').val(ui.item.id);
                }
            });

            // Auteur autocomplete
            $("#auteur").autocomplete({
                source: "{{ route('livres.autocomplete.auteur') }}",
                minLength: 2,
                select: function(event, ui) {
                    $('#auteur_id').val(ui.item.id);
                }
            });
        });

        $('#search').click(function() {
            let titre = $('#titre').val();
            let auteur_id = $('#auteur_id').val(); // مهم!
            let categorie_id = $('#categorie_id').val(); // مهم!

            $.ajax({
                url: "{{ route('livres.search') }}",
                type: "GET",
                data: {
                    titre: titre,
                    auteur_id: auteur_id,
                    categorie_id: categorie_id
                },
                success: function(response) {
                    $('#livres').html(response.livres);
                }
            });
        });

        // AJAX pagination clicks
        let categorie = $('#categorie_id').val();
        let auteur = $('#auteur_id').val();
        let titre = $('#titre').val();

        $.ajax({
            url: pageUrl,
            type: "GET",
            data: {
                titre: titre,
                auteur_id: auteur,
                categorie_id: categorie
            },
            success: function(response) {
                $('#livres').html(response.livres);
            },
            error: function(xhr) {
                alert('Erreur lors du chargement des livres');
                console.log(xhr.responseText); // هادي مهمة بزاف
            }
        });
    </script>

</body>


</html>