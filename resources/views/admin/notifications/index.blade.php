@extends('admin.Layout.app')

@section('content')
<h1 class="mb-4 text-center text-primary fw-bold">📌 Liste des notifications</h1>

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('notifications.create') }}" class="btn btn-success shadow">
        <i class="bi bi-plus-circle"></i> Ajouter une notification
    </a>
</div>

<div class="card shadow-lg border-0">
    <div class="card-header bg-primary text-white fw-bold">
        <i class="bi bi-bell-fill"></i> Notifications
    </div>
    <div class="card-body">
        @if($notifications->isEmpty())
            <div class="alert alert-info text-center">
                🚀 Aucune notification trouvée.
            </div>
        @else
            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Message</th>
                        <th>Étudiant</th>
                        <th>Livre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $notification)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $notification->message }}</td>
                            <td>{{ $notification->user_id }}</td>
                            <td>{{ $notification->livre_id}}</td>
                            <td>
                                <a href="{{ route('notifications.edit', $notification->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
