@extends('admin.Layout.app')
@section('content')
<div class="container mt-4">
    <h2>Liste des emprunts</h2>
    @if($emprunts->isEmpty())
    <div class="alert alert-info text-center py-4" role="alert">
        <i class="bi bi-info-circle-fill me-2"></i>
        Aucune emprunt
    </div>
    @else
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilisateur</th>
                    <th>Livre</th>
                    <th>Date d'emprunt</th>
                    <th>Date de retour</th>
                    <th>État du livre</th>
                    <th>Observation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emprunts as $emprunt)
                <tr>
                    <td>{{ $emprunt->id }}</td>
                    <td>{{ $emprunt->user->name ?? 'N/A' }}</td>
                    <td>{{ $emprunt->livre->titre ?? 'N/A' }}</td>
                    <td>{{ $emprunt->date_emprunt }}</td>
                    <td>{{ $emprunt->date_reteure }}</td>
                    <td>{{ $emprunt->etat_livre }}</td>
                    <td>{{ $emprunt->observation }}</td>
                    <td>
                        <a href="{{ route('admin.emprunts.show', $emprunt->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('admin.emprunts.edit', $emprunt->id) }}" class="btn btn-info btn-sm">modifier</a>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <div class="mt-3 d-flex justify-content-center align-items-center gap-2">
        <!-- Aller à la première page -->
        @if(!$emprunts->onFirstPage())
        <a href="{{ $emprunts->url(1) }}" class="btn btn-outline-primary shadow-sm">
            <i class="bi bi-chevron-double-left"></i> Première
        </a>
        @endif

        <!-- Bouton -5 pages -->
        @if($emprunts->currentPage() > 5)
        <a href="{{ $emprunts->url($emprunts->currentPage() - 5) }}" class="btn btn-outline-secondary shadow-sm">
            <i class="bi bi-arrow-left-circle"></i> -5
        </a>
        @endif

        <!-- Pagination Laravel -->
        {{ $emprunts->links('pagination::bootstrap-5') }}

        <!-- Bouton +5 pages -->
        @if($emprunts->currentPage() + 5 <= $emprunts->lastPage())
            <a href="{{ $emprunts->url($emprunts->currentPage() + 5) }}" class="btn btn-outline-secondary shadow-sm">
                +5 <i class="bi bi-arrow-right-circle"></i>
            </a>
            @endif

            <!-- Aller à la dernière page -->
            @if($emprunts->currentPage() < $emprunts->lastPage())
                <a href="{{ $emprunts->url($emprunts->lastPage()) }}" class="btn btn-outline-primary shadow-sm">
                    Dernière <i class="bi bi-chevron-double-right"></i>
                </a>
                @endif
    </div>
    @endif
</div>
@endsection