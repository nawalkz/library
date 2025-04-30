@extends('admin.Layout.app')

@section('title', 'Liste des categories')

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


    <h1 class="mb-4 text-center text-primary fw-bold">📌 Liste des categories</h1>




    <!-- Bouton pour ajouter une nouvelle categorie -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success shadow">
            <i class="bi bi-plus-circle"></i> Ajouter une nouvelle categorie
        </a>
    </div>

    <!-- Liste des categories -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="bi bi-list-task"></i> categories 
        </div>
        <div class="card-body">
            @if($categories->isEmpty())
                <div class="alert alert-info text-center py-4" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    🚀 Aucune categorie . Ajoutez-en une maintenant !
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nom de l'categorie</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $categorie)
                                <tr>
                                    <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $categorie->categorie }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.edit', $categorie->id) }}" class="btn btn-warning btn-sm shadow">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $categorie->id) }}" method="POST" class="d-inline delete-form"  onsubmit="confirmDelete(event, this)">
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
                    @if(!$categories->onFirstPage())
                        <a href="{{ $categories->url(1) }}" class="btn btn-outline-primary shadow-sm">
                            <i class="bi bi-chevron-double-left"></i> Première
                        </a>
                    @endif

                    <!-- Bouton -5 pages -->
                    @if($categories->currentPage() > 5)
                        <a href="{{ $categories->url($categories->currentPage() - 5) }}" class="btn btn-outline-secondary shadow-sm">
                            <i class="bi bi-arrow-left-circle"></i> -5
                        </a>
                    @endif

                    <!-- Pagination Laravel -->
                    {{ $categories->links('pagination::bootstrap-5') }}

                    <!-- Bouton +5 pages -->
                    @if($categories->currentPage() + 5 <= $categories->lastPage())
                        <a href="{{ $categories->url($categories->currentPage() + 5) }}" class="btn btn-outline-secondary shadow-sm">
                            +5 <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    @endif

                    <!-- Aller à la dernière page -->
                    @if($categories->currentPage() < $categories->lastPage())
                        <a href="{{ $categories->url($categories->lastPage()) }}" class="btn btn-outline-primary shadow-sm">
                            Dernière <i class="bi bi-chevron-double-right"></i>
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>

@endsection
