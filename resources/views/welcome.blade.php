<!DOCTYPE html>
<html lang="zxx">


<head>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">

    <!-- Title -->
    <title>..:: LIBRARIA ::..</title>

    <!-- Favicon -->
    <link href="assets/img/favicon.ico" rel="icon" type="image/x-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CLato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
    <link href="assets/temp/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Mobile Menu -->
    <link href="assets/temp/css/mmenu.css" rel="stylesheet" type="text/css" />
    <link href="assets/temp/css/mmenu.positioning.css" rel="stylesheet" type="text/css" />

    <!-- Stylesheet -->
    <link href=" assets/temp/style.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=" assets/temp/js/html5shiv.min.js"></script>
        <script src=" assets/temp/js/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <!-- Start: Header Section -->
    <header id="header-v1" class="navbar-wrapper">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-default">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="navbar-header">
                                <div class="navbar-brand">
                                    <h1>
                                        <a href="index-2.html">
                                            <img src="assets/img/libraria-logo-v1.png" alt="LIBRARIA" />
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
                                            <span> @php
                                                use Illuminate\Support\Facades\Auth;
                                                @endphp

                                                @if(Auth::check())
                                                <h4> <i class="fa fa-smile-o"></i>Bienvenue sur notre site web! {{ Auth::user()->name }}</h4>
                                                @else
                                                <h4><i class="fa fa-smile-o"></i>Bienvenue sur notre site web! </h4>
                                                @endif
                                            </span>
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
                                    
@auth
    @if(auth()->user()->isadmin)
        <li class="nav-item">
<a class="nav-link  text-white" href="{{ url('/admin') }}">
              dashboard
            </a>
        </li>
    @endif
@endauth

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
                </nav>
            </div>
        </div>
    </header>
    <!-- End: Header Section -->

    <!-- Start: Slider Section -->
    <div data-ride="carousel" class="carousel slide" id="home-v1-header-carousel">

        <!-- Carousel slides -->
        <div class="carousel-inner">
            <div class="item active">
                <figure>
                    <img alt="Home Slide" src="assets/img/header-slider/home-v2/header-slide.jpg" />
                </figure>
                <div class="container">
                    <div class="carousel-caption">

                        <h2>bienvenue à la Bibliothèque de l’ENA</h2>
                        <p>Notre bibliothèque propose une collection soigneusement sélectionnée de livres et de ressources en architecture et dans d'autres domaines, adaptée aux besoins des étudiants de l’ENA.
                        </p>
                        <p>
                            Que vous meniez des recherches, développiez vos idées ou soyez simplement en quête de découverte, la bibliothèque est là pour accompagner votre parcours académique.
                        </p>
                        <div class="slide-buttons hidden-sm hidden-xs">
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#home-v1-header-carousel" data-slide="prev"></a>
    <a class="right carousel-control" href="#home-v1-header-carousel" data-slide="next"></a>
    </div>
    <!-- End: Slider Section -->

    <!-- Start: Search Section -->
    <section class="search-filters">
        <div class="container">
            <div class="filter-box">
                <h3>Qu’aimeriez-vous découvrir à la bibliothèque?</h3>
                <form method="GET" class="row g-2 align-items-center" action="{{ route('livres.users.index') }}" id="search-form">

                    <!-- Titre (autocomplete) -->
                    <div class="col-md-3">
                        <select name="livre_id" class="form-control">
                            <option value=""> Choisis un livre</option>
                            @foreach (App\Models\Livre::all() as $liv)
                            <option value="{{ $liv->id }}">{{ $liv->titre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Auteur (autocomplete) -->
                    <div class="col-md-3">
                        <select name="auteur_id" class="form-control">
                            <option value="">Choisis un auteur</option>
                            @foreach (App\Models\Auteur::all() as $aut)
                            <option value="{{ $aut->id }}">{{ $aut->auteur }}</option>
                            @endforeach
                        </select>
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
                        <button type="submit" id="search" class="btn btn-primary search-btn rounded w-100">Recherche </button>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <!-- End: Search Section -->

    <!-- Start: Welcome Section -->
    <section class="welcome-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="welcome-wrap">


                        <div class="welcome-container">
                            <div class="welcome-card">
                                <h1>📚 Bienvenue sur <span>Libraria</span></h1>
                                <p class="subtitle">Votre passerelle vers le savoir et la découverte</p>

                                <p class="intro">
                                    Libraria est votre portail personnel de bibliothèque scolaire, conçu pour rendre l’emprunt de livres plus facile, plus intelligent et plus agréable.
                                    En quelques clics, explorez une large collection de livres, faites une demande d’emprunt et suivez vos ouvrages empruntés.
                                </p>

                                <div class="features">
                                    <h2>✨ Ce que vous pouvez faire:</h2>
                                    <ul>
                                        <li>📖 Parcourez des milliers de livres par catégorie, auteur ou titre.</li>
                                        <li>📝 Demandez et gérez vos emprunts avec des mises à jour en temps réel.</li>
                                        <li>🎯 Recevez des recommandations personnalisées selon votre historique de lecture.</li>
                                        <li>⏰ Restez informé grâce aux alertes d’échéance et aux rappels de retard.</li>
                                    </ul>
                                </div>

                                <p class="note">
                                    Parce que l’apprentissage commence par la lecture, et la lecture commence ici — dans votre Libraria</strong>.
                                </p>

                                <a href="{{ route('users.livres.livre_media')}}" class="start-btn">⏳ Commencez votre aventure maintenant!</a>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="welcome-image"></div>
    </section>
    <!-- End: Welcome Section -->

    <!-- Start: Category Filter -->
    <section class="category-filter section-padding">

        <div class="center-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="section-title">📘 Règles d’emprunt – Pour les utilisateurs</h2>
                    <span class="underline center"></span>
                </div>
            </div>
        </div>

        <div class="filter-buttons">
            <div class="filter btn" data-filter="all">Tous</div>
            <div class="filter btn" data-filter=".adults">Nombre de livres autorisés</div>
            <div class="filter btn" data-filter=".kids-teens">Durée de l’emprunt</div>
            <div class="filter btn" data-filter=".video">Retards et conséquences</div>
            <div class="filter btn" data-filter=".audio">Livres non retournés</div>
            <div class="filter btn" data-filter=".books">Responsabilités de l’utilisateur</div>
            <div class="filter btn" data-filter=".magazines">Responsabilités de l’utilisateur</div>
        </div>

        <div id="category-filter">
            <ul class="category-list">
                <li class="category-item adults">
                    <figure>
                        <img src="assets/img/3145765.png" alt="Nouvelle parution" />
                        <figcaption class="bg-orange">
                            <div class="info-block">
                                <p>Chaque utilisateur étudiant peut emprunter un seul livre par semaine</p>
                                <p>Aucun nouveau livre ne peut être emprunté tant que le précédent n’est pas retourné.</p>
                            </div>
                        </figcaption>
                    </figure>
                </li>

                <li class="category-item kids-teens">
                    <figure>
                        <img src="assets/img/8914962.png" alt="Nouvelle parution" />
                        <figcaption class="bg-orange">
                            <div class="info-block">
                                <p>L’utilisateur doit retourner le livre dans un délai d’une semaine à partir de la date d’emprunt.</p>
                                <p>La date limite de retour est affichée dans la section "Mes emprunts".</p>
                            </div>
                        </figcaption>
                    </figure>
                </li>

                <li class="category-item video">
                    <figure>
                        <img src="assets/img/9430414.png" alt="Nouvelle parution" />
                        <figcaption class="bg-orange">
                            <div class="info-block">
                                <p>Un retour tardif sera enregistré comme un retard.</p>
                                <p>Après deux retards consécutifs des mesures administratives peuvent être prises (suspension temporaire du compte).</p>
                                <p>Les retards fréquents peuvent être signalés à l’administration scolaire.</p>
                            </div>
                        </figcaption>
                    </figure>
                </li>

                <li class="category-item audio">
                    <figure>
                        <img src="assets/img/forbidden-books-vector-icon-warning-260nw-2350523973.webp" alt="Nouvelle parution" />
                        <figcaption class="bg-orange">
                            <div class="info-block">
                                <p>Si un livre n’est pas retourné dans un délai de deux semaines, il est considéré comme perdu .</p>
                                <p>L’administration de la bibliothèque contactera l’utilisateur pour résoudre le problème (remplacement ou compensation).</p>
                            </div>
                        </figcaption>
                    </figure>
                </li>

                <li class="category-item books">
                    <figure>
                        <img src="assets/img/4223198.png" alt="Nouvelle parution" />
                        <figcaption class="bg-orange">
                            <div class="info-block">

                                <p>Conserver le livre en bon état.</p>
                                <p>Le retourner à temps.</p>
                                <p>Respecter le règlement intérieur de la bibliothèque.</p>

                            </div>
                        </figcaption>
                    </figure>
                </li>

                <li class="category-item magazines">
                    <figure>
                        <img src="assets/img/16698607.png" alt="Nouvelle parution" class="w-20" />
                        <figcaption class="bg-orange">
                            <div class="info-block">
                                <p>Les utilisateurs peuvent suivre leurs emprunts via leur tableau de bord.</p>
                                <p>Il est recommandé d’activer les notifications pour recevoir des rappels avant la date de retour.</p>
                            </div>
                        </figcaption>
                    </figure>
                </li>

            </ul>

            <div class="clearfix"></div>
        </div>

    </section>
    <!-- Start: Category Filter -->


    <!-- Start: Meet Staff -->

    <!-- Start: Latest Blog -->
    <section class="latest-blog section-padding banner">


        <div class="container">
            <div class="center-content">
                <h2 class="section-title">Conseils pour une lecture efficace</h2>
                <span class="underline center"></span>
            </div>
            <div class="reading-tips">

                <ul>
                    <li>
                        <h3>Définissez un moment de lecture quotidien régulier pour créer une habitude.</h3>
                    </li>
                    <li>
                        <h3>Choisissez un environnement calme et bien éclairé pour rester concentré.</h3>
                    </li>
                    <li>
                        <h3>Prenez des notes et surlignez les idées clés pendant la lecture.</h3>
                    </li>
                    <li>
                        <h3>Lisez avec attention, en cherchant à comprendre plutôt qu’à simplement mémoriser.</h3>
                    </li>
                </ul>
            </div>
        </div>


    </section>
    <!-- End: Latest Blog -->




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
    <script type="text/javascript" src=" assets/temp/js/jquery-1.12.4.min.js"></script>

    <!-- jQuery UI -->
    <script type="text/javascript" src=" assets/temp/js/jquery-ui.min.js"></script>

    <!-- jQuery Easing -->
    <script type="text/javascript" src=" assets/temp/js/jquery.easing.1.3.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src=" assets/temp/js/bootstrap.min.js"></script>

    <!-- Mobile Menu -->
    <script type="text/javascript" src=" assets/temp/js/mmenu.min.js"></script>

    <!-- Harvey - State manager for media queries -->
    <script type="text/javascript" src=" assets/temp/js/harvey.min.js"></script>

    <!-- Waypoints - Load Elements on View -->
    <script type="text/javascript" src=" assets/temp/js/waypoints.min.js"></script>

    <!-- Facts Counter -->
    <script type="text/javascript" src=" assets/temp/js/facts.counter.min.js"></script>

    <!-- MixItUp - Category Filter -->
    <script type="text/javascript" src=" assets/temp/js/mixitup.min.js"></script>

    <!-- Owl Carousel -->
    <script type="text/javascript" src=" assets/temp/js/owl.carousel.min.js"></script>

    <!-- Accordion -->
    <script type="text/javascript" src=" assets/temp/js/accordion.min.js"></script>

    <!-- Responsive Tabs -->
    <script type="text/javascript" src=" assets/temp/js/responsive.tabs.min.js"></script>

    <!-- Responsive Table -->
    <script type="text/javascript" src=" assets/temp/js/responsive.table.min.js"></script>

    <!-- Masonry -->
    <script type="text/javascript" src=" assets/temp/js/masonry.min.js"></script>

    <!-- Carousel Swipe -->
    <script type="text/javascript" src=" assets/temp/js/carousel.swipe.min.js"></script>

    <!-- bxSlider -->
    <script type="text/javascript" src=" assets/temp/js/bxslider.min.js"></script>

    <!-- Custom Scripts -->
    <script type="text/javascript" src=" assets/temp/js/main.js"></script>

</body>


</html>