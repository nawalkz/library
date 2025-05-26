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
                                            <span><i class="fa fa-smile-o"></i> Bienvenue sur notre site !</span>
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
                                        <li> <a href="{{ route('users.livres.livre_media') }}">Books &amp; Media List View</a>
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
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="404.html">404/Error</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle disabled" href="blog.html">Blog</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="blog.html">Blog Grid View</a></li>
                                        <li><a href="blog-detail.html">Blog Detail</a></li>
                                    </ul>
                                </li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="contact.html">Contact</a></li>
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
                            <a href="index-2.html">Home</a>
                            <ul>
                                <li><a href="index-2.html">Home V1</a></li>
                                <li><a href="home-v2.html">Home V2</a></li>
                                <li><a href="home-v3.html">Home V3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{ route('users.livres.livre_media') }}">Books &amp; Media</a>
                            <ul class="dropdown-menu">
                                <li> <a href="{{ route('users.livres.livre_media') }}">Books &amp; Media List View</a>
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
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="signin.html">Signin/Register</a></li>
                                <li><a href="404.html">404/Error</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="blog.html">Blog</a>
                            <ul>
                                <li><a href="blog.html">Blog Grid View</a></li>
                                <li><a href="blog-detail.html">Blog Detail</a></li>
                            </ul>
                        </li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="contact.html">Contact</a></li>
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

                        <h3>Online Learning Anytime, Anywhere!</h3>
                        <h2>Discover Your Roots</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humor, or randomized words.</p>
                        <div class="slide-buttons hidden-sm hidden-xs">
                            <a href="#" class="btn btn-primary">Read More</a>
                            <a href="#" class="btn btn-default">Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img alt="Home Slide" src="assets/img/header-slider/home-v2/header-slide.jpg" />
                </figure>
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Online Learning Anytime, Anywhere!</h3>
                        <h2>Discover Your Roots</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humor, or randomized words.</p>
                        <div class="slide-buttons hidden-sm hidden-xs">
                            <a href="#" class="btn btn-primary">Read More</a>
                            <a href="#" class="btn btn-default">Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img alt="Home Slide" src="assets/img/header-slider/home-v2/header-slide.jpg" />
                </figure>
                <div class="container">
                    <div class="carousel-caption">
                        <h3>Online Learning Anytime, Anywhere!</h3>
                        <h2>Discover Your Roots</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humor, or randomized words.</p>
                        <div class="slide-buttons hidden-sm hidden-xs">
                            <a href="#" class="btn btn-primary">Read More</a>
                            <a href="#" class="btn btn-default">Purchase</a>
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
                            <option value="">Choisir une Livre</option>
                            @foreach (App\Models\Livre::all() as $liv)
                            <option value="{{ $liv->id }}">{{ $liv->titre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Auteur (autocomplete) -->
                    <div class="col-md-3">
                        <select name="auteur_id" class="form-control">
                            <option value="">Choisir un Auteur</option>
                            @foreach (App\Models\Auteur::all() as $aut)
                            <option value="{{ $aut->id }}">{{ $aut->auteur }}</option>
                            @endforeach
                        </select>
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
                <h2 class="section-title">Latest from Blog</h2>
                <span class="underline center"></span>
                <p class="lead">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
            </div>
            <div class="tabs-container">
                <div class="tabs-menu">
                    <ul>
                        <li class="active">
                            <a href="#" class="bg-yellow">
                                <div class="title">
                                    <i class="yellow"></i>
                                    <h3>Books</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="bg-light-green">
                                <div class="title">
                                    <i class="light-green"></i>
                                    <h3>eBooks</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="bg-blue">
                                <div class="title">
                                    <i class="blue"></i>
                                    <h3>DVDS</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="bg-red">
                                <div class="title">
                                    <i class="red"></i>
                                    <h3>Magazines</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="bg-violet">
                                <div class="title">
                                    <i class="violet"></i>
                                    <h3>Audio</h3>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="bg-green">
                                <div class="title">
                                    <i class="green"></i>
                                    <h3>eAudio</h3>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tabs-list">
                    <div class="tab-content active">
                        <article>
                            <figure>
                                <img src="assets/img/latest-blog-img-home-v1.jpg" alt="Latest Blog">
                                <figcaption>
                                    <a href="#.">
                                        <span class="date">07</span>
                                        <span class="month">Mar</span>
                                    </a>
                                </figcaption>
                            </figure>
                            <div class="post-detail">
                                <div class="info-bar">
                                    <div class="comments">
                                        <a href="#">
                                            <i class="fa fa-comment"></i> 37
                                        </a>
                                    </div>
                                    <div class="likes">
                                        <a href="#">
                                            <i class="fa fa-thumbs-o-up"></i> 110
                                        </a>
                                    </div>
                                    <div class="viewed">
                                        <a href="#">
                                            <i class="fa fa-eye"></i> 180
                                        </a>
                                    </div>
                                    <div class="share">
                                        <a href="#">
                                            <i class="fa fa-share-alt"></i> Share
                                        </a>
                                    </div>
                                </div>
                                <h4>It uses dictionary over 200 Latin</h4>
                                <div class="author">
                                    <a href="#">
                                        <i class="fa fa-user"></i> Adrey Pachai
                                    </a>
                                </div>
                                <p>Etiam posuere ultrices mauris vitae tincidunt. Cras lacinia, lectus quis ullamcorper auctor, mauris lacus imperdiet turpis, et semper enim massa ut diam. Sed at malesuada urna. Mauris quis venenatis leo. Proin a malesuada purus. Suspendisse odio diam, ornare sit amet interdum ut, vehicula a lorem. Donec a sem erat. Etiam condimentum semper mauris vitae porttitor.</p>
                                <a class="btn btn-dark-gray">Read More</a>
                            </div>
                        </article>
                    </div>
                    <div class="tab-content">
                        <article>
                            <figure>
                                <img src="assets/img/latest-blog-img-home-v1-2.jpg" alt="Latest Blog">
                                <figcaption>
                                    <a href="#.">
                                        <span class="date">06</span>
                                        <span class="month">Mar</span>
                                    </a>
                                </figcaption>
                            </figure>
                            <div class="post-detail">
                                <div class="info-bar">
                                    <div class="comments">
                                        <a href="#">
                                            <i class="fa fa-comment"></i> 37
                                        </a>
                                    </div>
                                    <div class="likes">
                                        <a href="#">
                                            <i class="fa fa-thumbs-o-up"></i> 110
                                        </a>
                                    </div>
                                    <div class="viewed">
                                        <a href="#">
                                            <i class="fa fa-eye"></i> 180
                                        </a>
                                    </div>
                                    <div class="share">
                                        <a href="#">
                                            <i class="fa fa-share-alt"></i> Share
                                        </a>
                                    </div>
                                </div>
                                <h4>eBooks</h4>
                                <div class="author">
                                    <a href="#">
                                        <i class="fa fa-user"></i> Adrey Pachai
                                    </a>
                                </div>
                                <p>Sed at malesuada urna. Mauris quis venenatis leo. Proin a malesuada purus. Suspendisse odio diam, ornare sit amet interdum ut, vehicula a lorem. Donec a sem erat. Etiam condimentum semper mauris vitae porttitor. Etiam posuere ultrices mauris vitae tincidunt. Cras lacinia, lectus quis ullamcorper auctor, mauris lacus imperdiet turpis, et semper enim massa ut.</p>
                                <a class="btn btn-dark-gray">Read More</a>
                            </div>
                        </article>
                    </div>
                    <div class="tab-content">
                        <article>
                            <figure>
                                <img src="assets/img/latest-blog-img-home-v1.jpg" alt="Latest Blog">
                                <figcaption>
                                    <a href="#.">
                                        <span class="date">05</span>
                                        <span class="month">Mar</span>
                                    </a>
                                </figcaption>
                            </figure>
                            <div class="post-detail">
                                <div class="info-bar">
                                    <div class="comments">
                                        <a href="#">
                                            <i class="fa fa-comment"></i> 37
                                        </a>
                                    </div>
                                    <div class="likes">
                                        <a href="#">
                                            <i class="fa fa-thumbs-o-up"></i> 110
                                        </a>
                                    </div>
                                    <div class="viewed">
                                        <a href="#">
                                            <i class="fa fa-eye"></i> 180
                                        </a>
                                    </div>
                                    <div class="share">
                                        <a href="#">
                                            <i class="fa fa-share-alt"></i> Share
                                        </a>
                                    </div>
                                </div>
                                <h4>DVDS</h4>
                                <div class="author">
                                    <a href="#">
                                        <i class="fa fa-user"></i> Adrey Pachai
                                    </a>
                                </div>
                                <p>Etiam posuere ultrices mauris vitae tincidunt. Cras lacinia, lectus quis ullamcorper auctor, mauris lacus imperdiet turpis, et semper enim massa ut diam. Sed at malesuada urna. Mauris quis venenatis leo. Proin a malesuada purus. Suspendisse odio diam, ornare sit amet interdum ut, vehicula a lorem. Donec a sem erat. Etiam condimentum semper mauris vitae porttitor.</p>
                                <a class="btn btn-dark-gray">Read More</a>
                            </div>
                        </article>
                    </div>
                    <div class="tab-content">
                        <article>
                            <figure>
                                <img src="assets/img/latest-blog-img-home-v1-2.jpg" alt="Latest Blog">
                                <figcaption>
                                    <a href="#.">
                                        <span class="date">04</span>
                                        <span class="month">Mar</span>
                                    </a>
                                </figcaption>
                            </figure>
                            <div class="post-detail">
                                <div class="info-bar">
                                    <div class="comments">
                                        <a href="#">
                                            <i class="fa fa-comment"></i> 37
                                        </a>
                                    </div>
                                    <div class="likes">
                                        <a href="#">
                                            <i class="fa fa-thumbs-o-up"></i> 110
                                        </a>
                                    </div>
                                    <div class="viewed">
                                        <a href="#">
                                            <i class="fa fa-eye"></i> 180
                                        </a>
                                    </div>
                                    <div class="share">
                                        <a href="#">
                                            <i class="fa fa-share-alt"></i> Share
                                        </a>
                                    </div>
                                </div>
                                <h4>Magazines</h4>
                                <div class="author">
                                    <a href="#">
                                        <i class="fa fa-user"></i> Adrey Pachai
                                    </a>
                                </div>
                                <p>Sed at malesuada urna. Mauris quis venenatis leo. Proin a malesuada purus. Suspendisse odio diam, ornare sit amet interdum ut, vehicula a lorem. Donec a sem erat. Etiam condimentum semper mauris vitae porttitor. Etiam posuere ultrices mauris vitae tincidunt. Cras lacinia, lectus quis ullamcorper auctor, mauris lacus imperdiet turpis, et semper enim massa ut.</p>
                                <a class="btn btn-dark-gray">Read More</a>
                            </div>
                        </article>
                    </div>
                    <div class="tab-content">
                        <article>
                            <figure>
                                <img src="assets/img/latest-blog-img-home-v1.jpg" alt="Latest Blog">
                                <figcaption>
                                    <a href="#.">
                                        <span class="date">03</span>
                                        <span class="month">Mar</span>
                                    </a>
                                </figcaption>
                            </figure>
                            <div class="post-detail">
                                <div class="info-bar">
                                    <div class="comments">
                                        <a href="#">
                                            <i class="fa fa-comment"></i> 37
                                        </a>
                                    </div>
                                    <div class="likes">
                                        <a href="#">
                                            <i class="fa fa-thumbs-o-up"></i> 110
                                        </a>
                                    </div>
                                    <div class="viewed">
                                        <a href="#">
                                            <i class="fa fa-eye"></i> 180
                                        </a>
                                    </div>
                                    <div class="share">
                                        <a href="#">
                                            <i class="fa fa-share-alt"></i> Share
                                        </a>
                                    </div>
                                </div>
                                <h4>Audio</h4>
                                <div class="author">
                                    <a href="#">
                                        <i class="fa fa-user"></i> Adrey Pachai
                                    </a>
                                </div>
                                <p>Etiam posuere ultrices mauris vitae tincidunt. Cras lacinia, lectus quis ullamcorper auctor, mauris lacus imperdiet turpis, et semper enim massa ut diam. Sed at malesuada urna. Mauris quis venenatis leo. Proin a malesuada purus. Suspendisse odio diam, ornare sit amet interdum ut, vehicula a lorem. Donec a sem erat. Etiam condimentum semper mauris vitae porttitor.</p>
                                <a class="btn btn-dark-gray">Read More</a>
                            </div>
                        </article>
                    </div>
                    <div class="tab-content">
                        <article>
                            <figure>
                                <img src="assets/img/latest-blog-img-home-v1-2.jpg" alt="Latest Blog">
                                <figcaption>
                                    <a href="#.">
                                        <span class="date">02</span>
                                        <span class="month">Mar</span>
                                    </a>
                                </figcaption>
                            </figure>
                            <div class="post-detail">
                                <div class="info-bar">
                                    <div class="comments">
                                        <a href="#">
                                            <i class="fa fa-comment"></i> 37
                                        </a>
                                    </div>
                                    <div class="likes">
                                        <a href="#">
                                            <i class="fa fa-thumbs-o-up"></i> 110
                                        </a>
                                    </div>
                                    <div class="viewed">
                                        <a href="#">
                                            <i class="fa fa-eye"></i> 180
                                        </a>
                                    </div>
                                    <div class="share">
                                        <a href="#">
                                            <i class="fa fa-share-alt"></i> Share
                                        </a>
                                    </div>
                                </div>
                                <h4>eAudio</h4>
                                <div class="author">
                                    <a href="#">
                                        <i class="fa fa-user"></i> Adrey Pachai
                                    </a>
                                </div>
                                <p>Sed at malesuada urna. Mauris quis venenatis leo. Proin a malesuada purus. Suspendisse odio diam, ornare sit amet interdum ut, vehicula a lorem. Donec a sem erat. Etiam condimentum semper mauris vitae porttitor. Etiam posuere ultrices mauris vitae tincidunt. Cras lacinia, lectus quis ullamcorper auctor, mauris lacus imperdiet turpis, et semper enim massa ut.</p>
                                <a class="btn btn-dark-gray">Read More</a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Latest Blog -->


    <!-- Start: News & Event -->
    <section class="news-events section-padding banner">
        <div class="container">
            <div class="center-content">
                <h2 class="section-title c-light">News &amp; Events</h2>
                <span class="underline center"></span>
                <p class="lead c-light">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
            </div>
            <div class="news-events-list">
                <div class="single-news-event">
                    <figure>
                        <img src="assets/img/news-event/news-event-01.jpg" alt="News & Event" />
                    </figure>
                    <div class="content-block">
                        <div class="member-info">
                            <div class="content_meta_category">
                                <span class="arrow-right"></span>
                                <a href="#." rel="category tag">EVENT</a>
                            </div>
                            <ul class="news-event-info">
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fa fa-calendar"></i>
                                        July 25, 2016
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fa fa-clock-o"></i>
                                        10:15 AM - 10:15 PM
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fa fa-map-marker"></i>
                                        New York, USA
                                    </a>
                                </li>
                            </ul>
                            <h3><a href=".html#">It uses a dictionary of over 200 Latin word</a></h3>
                            <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model.</p>
                            <a class="btn btn-primary" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="single-news-event">
                    <figure>
                        <img src="assets/img/news-event/news-event-02.jpg" alt="News & Event" />
                    </figure>
                    <div class="content-block">
                        <div class="member-info">
                            <div class="content_meta_category">
                                <span class="arrow-right"></span>
                                <a href="#." rel="category tag">EVENT</a>
                            </div>
                            <ul class="news-event-info">
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fa fa-calendar"></i>
                                        July 25, 2016
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fa fa-map-marker"></i>
                                        New York, USA
                                    </a>
                                </li>
                            </ul>
                            <h3><a href=".html#">It uses a dictionary of over 200 Latin word</a></h3>
                            <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', </p>
                            <a class="btn btn-primary" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="single-news-event">
                    <figure>
                        <img src="assets/img/news-event/news-event-03.jpg" alt="News & Event" />
                    </figure>
                    <div class="content-block">
                        <div class="member-info">
                            <div class="content_meta_category">
                                <span class="arrow-right"></span>
                                <a href="#." rel="category tag">EVENT</a>
                            </div>
                            <ul class="news-event-info">
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fa fa-calendar"></i>
                                        July 25, 2016
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fa fa-map-marker"></i>
                                        New York, USA
                                    </a>
                                </li>
                            </ul>
                            <h3><a href=".html#">It uses a dictionary of over 200 Latin word</a></h3>
                            <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', </p>
                            <a class="btn btn-primary" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
    <!-- End: News & Event -->


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
                            <li><a href="index-2.html">Home</a></li>
                            <li><a href="{{ route('users.livres.livre_media') }}">Books &amp; Media</a></li>
                            <li><a href="{{ route('users.reservations.index') }}">News &amp; Events</a></li>
                            <li><a href="#">Kids &amp; Teens</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="#">Research</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
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