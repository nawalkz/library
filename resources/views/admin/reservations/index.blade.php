
@extends('layouts.app')
@section('title', 'Liste des reservation')
@section('content')
@if (session('destroy'))
    <div class="alert alert-danger">
        {{ session('destroy') }}
    </div>
    @endif

<h1 class="mb-4 text-center text-primary fw-bold">📌 Liste des resevations</h1>




    
    </div>

    <!-- Liste des reservations -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="bi bi-list-task"></i> reservations 
        </div>
        <div class="card-body">
            @if($reservations->isEmpty())
                <div class="alert alert-info text-center py-4" reservation="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    🚀 Aucune reservation. Ajoutez-en une maintenant !
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th >Livre</th>
                                <th >Adhérent</th>
                                <th >Date de réservation</th>
                                <th >Actions</th>    
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td class="fw-bold">{{ $reservation->id }}</td>
                                    <td class="fw-bold">{{ $reservation->livre->titre  }}</td>
                                    <td class="fw-bold">{{ $reservation->user->name   }}</td>
                                    <td class="fw-bold">{{ $reservation->date_reservation }}</td>
                                   
                                    <td>
                                        <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="d-inline delete-form"  onsubmit="confirmDelete(event, this)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm shadow">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination améliorée -->
                <div class="mt-3 d-flex justify-content-center align-items-center gap-2">
                    <!-- Aller à la première page -->
                    @if(!$reservations->onFirstPage())
                        <a href="{{ $reservations->url(1) }}" class="btn btn-outline-primary shadow-sm">
                            <i class="bi bi-chevron-double-left"></i> Première
                        </a>
                    @endif

                    <!-- Bouton -5 pages -->
                    @if($reservations->currentPage() > 5)
                        <a href="{{ $reservations->url($reservations->currentPage() - 5) }}" class="btn btn-outline-secondary shadow-sm">
                            <i class="bi bi-arrow-left-circle"></i> -5
                        </a>
                    @endif

                    <!-- Pagination Laravel -->
                    {{ $reservations->links('pagination::bootstrap-5') }}

                    <!-- Bouton +5 pages -->
                    @if($reservations->currentPage() + 5 <= $reservations->lastPage())
                        <a href="{{ $reservations->url($reservations->currentPage() + 5) }}" class="btn btn-outline-secondary shadow-sm">
                            +5 <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    @endif

                    <!-- Aller à la dernière page -->
                    @if($reservations->currentPage() < $reservations->lastPage())
                        <a href="{{ $reservations->url($reservations->lastPage()) }}" class="btn btn-outline-primary shadow-sm">
                            Dernière <i class="bi bi-chevron-double-right"></i>
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>

@endsection
