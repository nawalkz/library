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
                                            <div class="topbar-links">
                                                <a href="signin.html"><i class="fa fa-lock"></i>Login / Register</a>
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
                                            <a data-toggle="dropdown" class="dropdown-toggle disabled" href="{{route('welcome')}}">Home</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('welcome')}}">Home V1</a></li>
                                                
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

        