@extends('admin.Layout.app')

@section('content')
<h1 class="mb-4 text-center text-dark fw-bold"> Liste des notifications</h1>



<div class="card shadow-lg border-0">
    <div class="card-header bg-dark text-white fw-bold">
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
                               
                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
