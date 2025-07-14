@extends('layouts.app')
        <!-- Start: Page Banner -->
        <section class="page-banner news-listing-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Confirmer la réservation</h2>
                    <span class="underline center"></span>
                    <p class="lead">Proin ac eros pellentesque dolor pharetra tempo.</p>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="{{route('welcome')}}">Accueil</a></li>
                        <li>Confirmer la réservation</li>
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
                                        <h3>Vous avez trouvé le livre qu’il vous faut ? Réservez-le en un clic !</h3>
                                                    @section('content')
                                                            <div class="container mt-4">

                                                    @if(session('error'))
                                                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                                    @endif

                                                    @if(session('success'))
                                                                    <div class="alert alert-success">{{ session('success') }}</div>
                                                    @endif
                                                                <div class="card mt-3">
                                                                    <div class="card-body">
                                                                        <img src="{{ asset('storage/' . $livre->image) }}" alt="Book">
                                                                        <h5 class="card-title">{{ $livre->titre }}</h5>
                                                                        <p class="card-text"><strong>Auteur:</strong> {{ $livre->auteur->auteur ?? 'Auteur inconnu' }}</p>
                                                                        <p class="card-text"><strong>Catégorie:</strong> {{ $livre->categorie->categorie ?? 'Catégorie inconnue' }}</p>
                                                                        <p class="card-text"><strong>Disponible:</strong> {{ $livre->nombre_inventaire> 0 ? 'Oui' : 'Non' }}</p>

                                                                        @if ($livre->nombre_inventaire > 0)
                                                                            <form action="{{ route('users.reservations.store') }}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="livre_id" value="{{ $livre->id }}">
                                                                                <button type="submit" class="btn btn-primary">Confirmer la réservation</button>
                                                                            </form>
                                                                        @else
                                                                            <div class="alert alert-warning">Ce livre n’est pas disponible actuellement.</div>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                            </div>
                                                    @endsection

                                    </div>

                                        </div>
                                        
                                </div>
                                <div class="clear"></div>
                            </section>
                            