<form method="POST" action="{{ route('admin.emprunts.update', $emprunt->id) }}">
    @csrf
    @method('PUT')

    <label for="date_retour_reelle">Date de retour réelle:</label>
    <input type="date" name="date_retour_reelle" value="{{ date('Y-m-d') }}" class="form-control">

    <label for="etat_livre">État du livre:</label>
    <select name="etat_livre" class="form-control">
        <option value="bon">Bon</option>
        <option value="endommagé">Endommagé</option>
    </select>

    <label for="observation">Observation:</label>
    <textarea name="observation" class="form-control"></textarea>

    <button type="submit" class="btn btn-success mt-2">Enregistrer le retour</button>
</form>
