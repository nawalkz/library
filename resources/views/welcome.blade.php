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
                                        <<div class="topbar-info">
                                            <span>  @php 
        use Illuminate\Support\Facades\Auth;
    @endphp

    @if(Auth::check())
        <h2> <i class="fa fa-smile-o"></i>Welcome to our website  {{ Auth::user()->name }}</h2>
    @else
        <h2><i class="fa fa-smile-o"></i>Welcome to our website </h2>
    @endif </span>
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
                                        <li> <a href="{{ route('users.livres.livre_media') }}">Books &amp; </a>
                                        </li>

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

                                        <li> <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                                                {{ __('Profile') }}
                                            </x-nav-link></li>

                                        <li><a href="{{ route('users.reservations.emprunt') }}">Cart</a></li>
                                        
                                    </ul>
                                </li>
                                 @auth
<li class="dropdown">
    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
        🔔 Notifications
        @if(auth()->user()->unreadNotifications->count())
            <span class="badge bg-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-end p-2" style="width: 300px; max-height: 300px; overflow-y: auto;">
        @forelse(auth()->user()->unreadNotifications as $notification)
            <li class="dropdown-item small">
                📚 {{ $notification->data['message'] }}
            </li>
        @empty
            <li class="dropdown-item text-muted text-center">Aucune notification</li>
        @endforelse
    </ul>
</li>
@endauth

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
                            <a href="{{ route('welcome')}}">Home</a>
                            <ul>
                                <li><a href="{{ route('welcome')}}">Home</a></li>

                            </ul>
                        </li>
                        <li>
                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('users.livres.livre_media') }}">Books &amp; Media</a>
                            <ul class="dropdown-menu">
                                <li> <a href="{{ route('users.livres.livre_media') }}">Books &amp; </a>
                                </li>
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

                                <li> <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-nav-link></li>

                                <li><a href="{{ route('users.reservations.emprunt') }}">Cart</a></li>
                               
                            </ul>
                        </li>

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


                        <h2>Welcome to the ENA Architecture Library</h2>
                        <p>
                            Your gateway to knowledge, creativity, and discovery.
                            Our library offers a curated collection of books and resources in architecture and beyond, tailored for students of ENA.
                        </p>
                        <p>
                            Whether you're conducting research, expanding your ideas, or just exploring, the library is here to support your academic journey.
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
                <h3>What are you looking for at the library?</h3>
                <form method="GET" class="row g-2 align-items-center" action="{{ route('livres.users.index') }}" id="search-form">

                    <!-- Titre (autocomplete) -->
                    <div class="col-md-3">
                        <select name="livre_id" class="form-control">
                            <option value=""> Choose a Book</option>
                            @foreach (App\Models\Livre::all() as $liv)
                            <option value="{{ $liv->id }}">{{ $liv->titre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Auteur (autocomplete) -->
                    <div class="col-md-3">
                        <select name="auteur_id" class="form-control">
                            <option value="">Choose an Author</option>
                            @foreach (App\Models\Auteur::all() as $aut)
                            <option value="{{ $aut->id }}">{{ $aut->auteur }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Catégorie (select) -->
                    <div class="col-md-3">
                        <select name="categorie_id" class="form-control">
                            <option value="">Choose a Category</option>
                            @foreach (App\Models\Categorie::all() as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->categorie }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Bouton Search -->
                    <div class="col-md-2">
                        <button type="submit" id="search" class="btn btn-primary search-btn rounded w-100">SEARCH</button>
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
                                <h1>📚 Welcome to <span>Libraria</span></h1>
                                <p class="subtitle">Your Gateway to Knowledge & Discovery</p>

                                <p class="intro">
                                    Libraria is your personal school library portal, designed to make borrowing books easier, smarter, and more enjoyable.
                                    With just a few clicks, you can explore a wide collection of books, request a loan, and track your borrowed items.
                                </p>

                                <div class="features">
                                    <h2>✨ What you can do:</h2>
                                    <ul>
                                        <li>📖 Browse thousands of books by category, author, or title.</li>
                                        <li>📝 Request and manage book loans with real-time status updates.</li>
                                        <li>🎯 Get personalized recommendations based on your reading history.</li>
                                        <li>⏰ Stay informed with due date alerts and overdue notifications.</li>
                                    </ul>
                                </div>

                                <p class="note">
                                    Because learning starts with reading, and reading starts here — in your <strong>Libraria</strong>.
                                </p>

                                <a href="{{ route('users.livres.livre_media') }}" class="start-btn">⏳ Start your journey now!</a>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="welcome-image"></div>
    </section>
    <!-- End: Welcome Section -->

    <!-- Start: Category Filter -->
    <section class="category-filter section-padding">
        <div class="container">
            <div class="center-content">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h2 class="section-title">📘 Borrowing Guidelines – For Users</h2>
                        <span class="underline center"></span>
                    </div>
                </div>
            </div>
            <div class="filter-buttons">
                <div class="filter btn" data-filter="all">All</div>
                <div class="filter btn" data-filter=".adults">Number of Allowed Books</div>
                <div class="filter btn" data-filter=".kids-teens">Borrowing Duration</div>
                <div class="filter btn" data-filter=".video">Late Returns and Consequences</div>
                <div class="filter btn" data-filter=".audio">Unreturned Books</div>
                <div class="filter btn" data-filter=".books">User Responsibilities</div>
                <div class="filter btn" data-filter=".magazines">User Responsibilities</div>
            </div>
        </div>
        <div id="category-filter">
            <ul class="category-list">
                <li class="category-item adults">
                    <figure>

                        <img src="assets/img/3145765.png" alt="New Releaase" />
                        <figcaption class="bg-orange">
                            <div class="info-block">
                                <p>Each user (student or teacher) is allowed to borrow <strong>only one book per week</strong>.</p>
                                <p>No new book can be borrowed until the previous one is returned.</p>

                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li class="category-item kids-teens">
                    <figure>
                        <img src="assets/img/8914962.png" alt="New Releaase" />
                        <figcaption class="bg-orange">
                            <div class="info-block">
                                <p>The user must <strong>return the book within one week</strong> from the borrowing date.</p>
                                <p>The expected return date is shown in the "My Borrowings" section.</p>

                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li class="category-item video">
                    <figure>
                        <img src="assets/img/9430414.png" alt="New Releaase" />
                        <figcaption class="bg-orange">
                            <div class="info-block">
                                <p>If the user returns the book late, it will be recorded as a <strong>delay</strong>.</p>
                                <p>After <strong>two consecutive delays</strong>, administrative actions may be taken (such as temporary account suspension).</p>
                                <p>Frequent delays may be reported to the school administration.</p>

                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li class="category-item audio">
                    <figure>
                        <img src="assets/img/forbidden-books-vector-icon-warning-260nw-2350523973.webp" alt="New Releaase" />
                        <figcaption class="bg-orange">
                            <div class="info-block">
                                <p>If a book is not returned <strong>within two weeks</strong>, it is considered <strong>lost</strong>.</p>
                                <p>The library administration will contact the user to resolve the issue (replacement or compensation).</p>

                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li class="category-item books">
                    <figure>
                        <img src="assets/img/4223198.png" alt="New Releaase" />
                        <figcaption class="bg-orange">
                            <div class="info-block">
                                <ul>
                                    <li>Keep the book in good condition.</li>
                                    <li>Return it on time.</li>
                                    <li>Follow the internal library rules.</li>
                                </ul>
                            </div>
                        </figcaption>
                    </figure>
                </li>
                <li class="category-item magazines">
                    <figure>
                        <img src="assets/img/16698607.png" alt="New Releaase" class="w-20" />
                        <figcaption class="bg-orange">
                            <div class="info-block">
                                <p>Users can track their borrowings via their dashboard.</p>
                                <p>It is recommended to enable notifications to receive reminders before the return date.</p>

                            </div>
                        </figcaption>
                    </figure>
                </li>

            </ul>
            <div class="center-content">
                <a href="#" class="btn btn-primary">View More</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Start: Category Filter -->


    <!-- Start: Meet Staff -->

    <!-- Start: Latest Blog -->
    <section class="latest-blog section-padding banner">
        <div class="container">
            <div class="center-content">
                <h2 class="section-title">Effective Reading Tips</h2>
                <span class="underline center"></span>
            </div>
            <div class="reading-tips">

                <ul>
                    <li>
                        <h3>Set a consistent daily reading time to build the habit.</h3>
                    </li>
                    <li>
                        <h3>Choose a quiet and well-lit environment to help you focus.</h3>
                    </li>
                    <li>
                        <h3>Take notes and highlight key ideas while reading.</h3>
                    </li>
                    <li>
                        <h3>Read with attention, aiming to understand rather than just memorize.</h3>
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