<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapport des emprunts</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        h1, h3 { text-align: center; }
    </style>
</head>
<body>
    <h1>Rapport des Emprunts</h1>
    <h3>Étudiant: {{ $user->name }} | Email: {{ $user->email }}</h3>

    <p><strong>Total emprunts:</strong> {{ $total }}</p>
    <p><strong>Livres retournés à temps:</strong> {{ $returnedOnTime }}</p>
    <p><strong>Livres en retard:</strong> {{ $late }}</p>
    <p><strong>Non retournés:</strong> {{ $notReturned }}</p>

    <table>
        <thead>
            <tr>
                <th>Livre</th>
                <th>Date emprunt</th>
                <th>Date retour prévue</th>
                <th>Date retour réelle</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emprunts as $e)
            <tr>
                <td>{{ $e->livre->titre ?? 'N/A' }}</td>
                <td>{{ $e->date_emprunt }}</td>
                <td>{{ $e->date_reteure }}</td>
                <td>{{ $e->date_retour_reelle ?? 'Non retourné' }}</td>
                <td>
                    @if($e->date_retour_reelle === null)
                        Non retourné
                    @elseif($e->date_retour_reelle <= $e->date_reteure)
                        Retourné à temps
                    @else
                        En retard
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
