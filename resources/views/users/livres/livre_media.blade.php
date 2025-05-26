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
                                            <span><i class="fa fa-smile-o"></i> Bienvenue chez Libraria – votre partenaire de lecture !</span>
                                        </div>

                                    </div>
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
                                            <div class="header-cart dropdown">
                                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    <small>0</small>
                                                </a>
                                                <div class="dropdown-menu cart-dropdown">
                                                    <ul>
                                                        <li class="clearfix">
                                                            <img src="../../assets/img/header-cart-image-01.jpg" alt="cart item" />
                                                            <div class="item-info">
                                                                <div class="name">
                                                                    <a href="#">The Great Gatsby</a>
                                                                </div>
                                                                <div class="author"><strong>Author:</strong> F. Scott Fitzgerald</div>
                                                                <div class="price">1 X $10.00</div>
                                                            </div>
                                                            <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>
                                                        </li>
                                                        <li class="clearfix">
                                                            <img src="../../assets/img/header-cart-image-02.jpg" alt="cart item" />
                                                            <div class="item-info">
                                                                <div class="name">
                                                                    <a href="#">The Great Gatsby</a>
                                                                </div>
                                                                <div class="author"><strong>Author:</strong> F. Scott Fitzgerald</div>
                                                                <div class="price">1 X $10.00</div>
                                                            </div>
                                                            <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>
                                                        </li>
                                                        <li class="clearfix">
                                                            <img src="../../assets/img/header-cart-image-03.jpg" alt="cart item" />
                                                            <div class="item-info">
                                                                <div class="name">
                                                                    <a href="#">The Great Gatsby</a>
                                                                </div>
                                                                <div class="author"><strong>Author:</strong> F. Scott Fitzgerald</div>
                                                                <div class="price">1 X $10.00</div>
                                                            </div>
                                                            <a class="remove" href="#"><i class="fa fa-trash-o"></i></a>
                                                        </li>
                                                    </ul>
                                                    <div class="cart-total">
                                                        <div class="title">SubTotal</div>
                                                        <div class="price">$30.00</div>
                                                    </div>
                                                    <div class="cart-buttons">
                                                        <a href="{{ route('users.reservations.emprunt') }}" class="btn btn-dark-gray">View Cart</a>
                                                        <a href="checkout.html" class="btn btn-primary">Checkout</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="navbar-collapse hidden-sm hidden-xs">
                                <ul class="nav navbar-nav">
                                    <li class="dropdown active">
                                        <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('welcome')}}">Home</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('welcome')}}">Home</a></li>

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
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="signin.html">Signin/Register</a></li>
                                            <li><a href="404.html">404/Error</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
    </header>
    <!-- End: Header Section -->

    <!-- Start: Page Banner -->
    <section class="page-banner services-banner">
        <div class="container">
            <div class="banner-header">
                <h2>Books & Media Listing</h2>
                <span class="underline center"></span>
                <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="{{ route('welcome')}}">Home</a></li>
                    <li>Books & Media</li>
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
                                            <h3>What are you looking for at the library?</h3>
                                            <form method="GET" class="row g-2 align-items-center">

                                                <!-- Titre (autocomplete) -->
                                                <div class="col-md-3">
                                                    <input type="text" id="titre" class="form-control" placeholder="Search by Keyword">
                                                    <input type="hidden" name="titre_id" id="titre_id">
                                                </div>

                                                <!-- Auteur (autocomplete) -->
                                                <div class="col-md-3">
                                                    <input type="text" id="auteur" class="form-control" placeholder="Search the auteur">
                                                    <input type="hidden" name="auteur_id" id="auteur_id">
                                                </div>

                                                <!-- Catégorie (select) -->
                                                <div class="col-md-3">
                                                    <select name="categorie_id" class="form-control">
                                                        <option value="">Choisir une category</option>
                                                        @foreach (App\Models\Categorie::all() as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->categorie }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Bouton Search -->
                                                <div class="col-md-2">
                                                    <button type="button" id="search" class="btn btn-primary search-btn rounded w-100">SEARCH</button>
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
        <div class="container">
            <div id="footer-widgets">
                <div class="row">
                    <div class="col-md-4 col-sm-6 widget-container">
                        <div id="text-2" class="widget widget_text">
                            <h3 class="footer-widget-title">About Libraria</h3>
                            <span class="underline left"></span>
                            <div class="textwidget">
                                It is a long established fact that a reader will be distracted by the readable content of a page when looking.
                            </div>
                            <address>
                                <div class="info">
                                    <i class="fa fa-location-arrow"></i>
                                    <span>21 King Street, Melbourne, Victoria 3000 Australia</span>
                                </div>
                                <div class="info">
                                    <i class="fa fa-envelope"></i>
                                    <span><a href="mailto:support@libraria.com">support@libraria.com</a></span>
                                </div>
                                <div class="info">
                                    <i class="fa fa-phone"></i>
                                    <span><a href="tel:012-345-6789">+ 012-345-6789</a></span>
                                </div>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 widget-container">
                        <div id="nav_menu-2" class="widget widget_nav_menu">
                            <h3 class="footer-widget-title">Quick Links</h3>
                            <span class="underline left"></span>
                            <div class="menu-quick-links-container">
                                <ul id="menu-quick-links" class="menu">
                                    <li><a href="#">Library News</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Meet Our Staff</a></li>
                                    <li><a href="#">Board of Trustees</a></li>
                                    <li><a href="#">Budget</a></li>
                                    <li><a href="#">Annual Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix hidden-lg hidden-md hidden-xs tablet-margin-bottom"></div>
                    <div class="col-md-2 col-sm-6 widget-container">
                        <div id="text-4" class="widget widget_text">
                            <h3 class="footer-widget-title">Timing</h3>
                            <span class="underline left"></span>
                            <div class="timming-text-widget">
                                <time datetime="2017-02-13">Mon - Thu: 9 am - 9 pm</time>
                                <time datetime="2017-02-13">Fri: 9 am - 6 pm</time>
                                <time datetime="2017-02-13">Sat: 9 am - 5 pm</time>
                                <time datetime="2017-02-13">Sun: 1 pm - 6 pm</time>
                                <ul>
                                    <li><a href="#">Closings</a></li>
                                    <li><a href="#">Branches</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 widget-container">
                        <div class="widget twitter-widget">
                            <h3 class="footer-widget-title">Latest Tweets</h3>
                            <span class="underline left"></span>
                            <div id="twitter-feed">
                                <ul>
                                    <li>
                                        <p><a href="#">@TemplateLibraria</a> Sed ut perspiciatis unde omnis iste natus error sit voluptatem. <a href="#">template-libraria.com</a></p>
                                    </li>
                                    <li>
                                        <p><a href="#">@TemplateLibraria</a> Sed ut perspiciatis unde omnis iste natus error sit voluptatem. <a href="#">template-libraria.com</a></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="footer-text col-md-3">
                        <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                    </div>
                    <div class="col-md-9 pull-right">
                        <ul>
                            <li><a href="{{ route('welcome')}}">Home</a></li>
                            <li><a href="{{ route('users.livres.livre_media') }}">Books &amp; Media</a></li>
                            <li><a href="{{ route('users.reservations.index') }}">News &amp; Events</a></li>
                            <li><a href="#">Pages</a></li>
                            <li><a href="contact.html">Contact</a></li>
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