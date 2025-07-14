@extends('admin.Layout.app')
@section('content')

<div class="container mt-4">
    <h3>📋 Rapport des emprunts</h3>

    <form method="GET" action="{{ route('admin.emprunts.rapport') }}">
        <div class="form-group">
            <label for="email">Email de l'étudiant :</label>
    <input type="text" name="email" id="email" autocomplete="off" class="form-control">
    <div id="emailList" style="position: absolute; z-index: 999; background: white;"></div>
    <button type="submit" class="btn btn-primary mt-2">Chercher</button>
        </div>
          </form>

    @if($user)
        <hr>
        <h4>👤 {{ $user->name }} | {{ $user->email }}</h4>

        <div class="row mt-3 mb-3">
            <div class="col-md-3"><strong>Total emprunts :</strong> {{ $total }}</div>
            <div class="col-md-3"><strong>Retournés à temps :</strong> {{ $returnedOnTime }}</div>
            <div class="col-md-3"><strong>Retards :</strong> {{ $late }}</div>
            <div class="col-md-3"><strong>Non retournés :</strong> {{ $notReturned }}</div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Livre</th>
                    <th>Date d'emprunt</th>
                    <th>Date prévue</th>
                    <th>Date réelle</th>
                    <th>État</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emprunts as $emp)
                <tr>
                    <td>{{ $emp->livre->titre }}</td>
                    <td>{{ $emp->date_emprunt }}</td>
                    <td>{{ $emp->date_reteure }}</td>
                    <td>{{ $emp->date_retour_reelle ?? 'Pas encore' }}</td>
                    <td>
                        @if($emp->date_retour_reelle === null)
                            <span class="text-danger">Non retourné</span>
                        @elseif($emp->date_retour_reelle > $emp->date_reteure)
                            <span class="text-warning">Retard</span>
                        @else
                            <span class="text-success">À temps</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('emprunts.downloadRapport', $user->id) }}" class="btn btn-primary" target="_blank">
    Télécharger le rapport PDF
</a>

    @endif
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#email').keyup(function () {
        let query = $(this).val();
        if (query.length >= 2) {
            $.ajax({
                url: "{{ route('autocomplete.email') }}",
                method: "GET",
                data: { query: query },
                success: function (data) {
                    let list = '<ul class="list-group">';
                    data.forEach(item => {
                        list += `<li class="list-group-item email-item" style="cursor:pointer">${item.email}</li>`;
                    });
                    list += '</ul>';
                    $('#emailList').fadeIn().html(list);
                }
            });
        } else {
            $('#emailList').fadeOut();
        }
    });

    // on click suggestion
    $(document).on('click', '.email-item', function () {
        $('#email').val($(this).text());
        $('#emailList').fadeOut();
    });
});
</script>
