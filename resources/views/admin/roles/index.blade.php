@extends('admin.Layout.app')

@section('title', 'Liste des roles')

@section('content')

    <h1 class="mb-4 text-center text-primary fw-bold">📌 Liste des roles</h1>




    <!-- Bouton pour ajouter une nouvelle role -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('roles.create') }}" class="btn btn-success shadow">
            <i class="bi bi-plus-circle"></i> Ajouter une nouvelle role
        </a>
    </div>

    <!-- Liste des roles -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="bi bi-list-task"></i> roles 
        </div>
        <div class="card-body">
            @if($roles->isEmpty())
                <div class="alert alert-info text-center py-4" role="alert">
                    <i class="bi bi-info-circle-fill me-2"></i>
                    🚀 Aucune role . Ajoutez-en une maintenant !
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nom de l'role</th>
                                <th>Periode</th>
                                <th>Nombre livre</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ ($roles->currentPage() - 1) * $roles->perPage() + $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $role->role }}</td>
                                    <td class="fw-bold">{{ $role->periode}}</td>
                                    <td class="fw-bold">{{ $role->nombre_livre }}</td>
                                    <td>
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm shadow">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline delete-form"  onsubmit="confirmDelete(event, this)">
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
                    @if(!$roles->onFirstPage())
                        <a href="{{ $roles->url(1) }}" class="btn btn-outline-primary shadow-sm">
                            <i class="bi bi-chevron-double-left"></i> Première
                        </a>
                    @endif

                    <!-- Bouton -5 pages -->
                    @if($roles->currentPage() > 5)
                        <a href="{{ $roles->url($roles->currentPage() - 5) }}" class="btn btn-outline-secondary shadow-sm">
                            <i class="bi bi-arrow-left-circle"></i> -5
                        </a>
                    @endif

                    <!-- Pagination Laravel -->
                    {{ $roles->links('pagination::bootstrap-5') }}

                    <!-- Bouton +5 pages -->
                    @if($roles->currentPage() + 5 <= $roles->lastPage())
                        <a href="{{ $roles->url($roles->currentPage() + 5) }}" class="btn btn-outline-secondary shadow-sm">
                            +5 <i class="bi bi-arrow-right-circle"></i>
                        </a>
                    @endif

                    <!-- Aller à la dernière page -->
                    @if($roles->currentPage() < $roles->lastPage())
                        <a href="{{ $roles->url($roles->lastPage()) }}" class="btn btn-outline-primary shadow-sm">
                            Dernière <i class="bi bi-chevron-double-right"></i>
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>

@endsection
