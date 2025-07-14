

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
                                            <span> 
                                                <h2> <i class="fa fa-smile-o"></i></h2>
                                                
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