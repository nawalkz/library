@extends('admin.Layout.app')

@section('content')
<h1 class="mb-4 text-center text-primary fw-bold">👥 Liste des utilisateurs</h1>

<!-- Bouton pour ajouter un utilisateur -->
<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('users.create') }}" class="btn btn-success shadow">
        <i class="bi bi-plus-circle"></i> Ajouter un utilisateur
    </a>
</div>

<!-- Liste des utilisateurs -->
<div class="card shadow-lg border-0">
    <div class="card-header bg-primary text-white fw-bold">
        <i class="bi bi-list-task"></i> Utilisateurs
    </div>
    <div class="card-body">
        @if($users->isEmpty())
            <div class="alert alert-info text-center py-4">
                <i class="bi bi-info-circle-fill me-2"></i> Aucun utilisateur trouvé.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Ville</th>
                            <th>Téléphone</th>
                            <th>Admin</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->ville }}</td>
                            <td>{{ $user->telephone }}</td>
                            <td>
                                @if($user->isadmin)
                                    <span class="badge bg-success">Oui</span>
                                @else
                                    <span class="badge bg-secondary">Non</span>
                                @endif
                            </td>
                            <td>{{ $user->role->role  }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet utilisateur ?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links('pagination::bootstrap-5') }}
        @endif
    </div>
</div>
@endsection
