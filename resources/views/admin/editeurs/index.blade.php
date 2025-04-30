@extends('admin.Layout.app')

@section('title', 'Liste des editeurs')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('update'))
    <div class="alert alert-primary">
        {{ session('update') }}
    </div>
    @endif
    @if (session('destroy'))
    <div class="alert alert-danger">
        {{ session('destroy') }}
    </div>
    @endif


    <h1 class="mb-4 text-center text-primary fw-bold">📌 Liste des editeurs</h1>




    <!-- Bouton pour ajouter une nouvelle editeur -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.editeurs.create') }}" class="btn btn-success shadow">
            <i class="bi bi-plus-circle"></i> Ajouter une nouvelle editeur
        </a>
    </div>

    <!-- Liste des editeurs -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="bi bi-list-task"></i> editeurs 
        </div>
        <div class="card-body">
            @if($editeurs->isEmpty())
                <div class="alert alert-info text-center py-4" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    🚀 Aucune editeur . Ajoutez-en une maintenant !
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nom de l'editeur</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($editeurs as $editeur)
                                <tr>
                                    <td>{{ ($editeurs->currentPage() - 1) * $editeurs->perPage() + $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $editeur->editeur }}</td>
                                    <td>
                                        <a href="{{ route('admin.editeurs.edit', $editeur->id) }}" class="btn btn-warning btn-sm shadow">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.editeurs.destroy', $editeur->id) }}" method="POST" class="d-inline delete-form"  onsubmit="confirmDelete(event, this)">
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
                    @if(!$editeurs->onFirstPage())
                        <a href="{{ $editeurs->url(1) }}" class="btn btn-outline-primary shadow-sm">
                            <i class="bi bi-chevron-double-left"></i> Première
                        </a>
                    @endif

                    <!-- Bouton -5 pages -->
                    @if($editeurs->currentPage() > 5)
                        <a href="{{ $editeurs->url($editeurs->currentPage() - 5) }}" class="btn btn-outline-secondary shadow-sm">
                            <i class="bi bi-arrow-left-circle"></i> -5
                        </a>
                    @endif

                    <!-- Pagination Laravel -->
                    {{ $editeurs->links('pagination::bootstrap-5') }}

                    <!-- Bouton +5 pages -->
                    @if($editeurs->currentPage() + 5 <= $editeurs->lastPage())
                        <a href="{{ $editeurs->url($editeurs->currentPage() + 5) }}" class="btn btn-outline-secondary shadow-sm">
                            +5 <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    @endif

                    <!-- Aller à la dernière page -->
                    @if($editeurs->currentPage() < $editeurs->lastPage())
                        <a href="{{ $editeurs->url($editeurs->lastPage()) }}" class="btn btn-outline-primary shadow-sm">
                            Dernière <i class="bi bi-chevron-double-right"></i>
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>

@endsection
