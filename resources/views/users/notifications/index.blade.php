@extends('layouts.app')
        <!-- Start: Page Banner -->
        <section class="page-banner news-listing-banner services-banner">
            <div class="container">
                <div class="banner-header">
                    <h2>Notifications</h2>
                    <span class="underline center"></span>
                    
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="{{route('welcome')}}">Accueil</a></li>
                        <li>Notifications</li>
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
                                        
                                                    @section('content')
                                                            <div class="container mt-4">

   

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($notifications->count() > 0)
        <form action="{{ route('notifications.readAll') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-primary mb-3">📩 Marquer tout comme lu</button>
        </form>

        <ul class="list-group">
            @foreach($notifications as $notification)
                <li class="list-group-item d-flex justify-content-between align-items-center 
                    @if(is_null($notification->read_at)) list-group-item-warning @endif">

                    <div>
                        {{ $notification->data['message'] ?? 'Notification' }} <br>
                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                    </div>

                    @if(is_null($notification->read_at))
                        <a href="{{ route('notifications.read', $notification->id) }}" class="btn btn-sm btn-success">
                            Marquer comme lu
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune notification trouvée.</p>
    @endif
</div>
 
                                                    @endsection

                                    </div>

                                        </div>
                                        
                                </div>
                                <div class="clear"></div>
                            </section>
