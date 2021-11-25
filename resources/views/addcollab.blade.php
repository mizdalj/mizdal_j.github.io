@extends('layouts.default')

@section('title')
    Ajout Collaborateur
@endsection

@section('body')

    <h1>Ajout collaborateur</h1>
    <form action="createformc" method="POST" id="addcollab">
        @csrf
        <input type="text" name="civilite" placeholder="CivilitÃ©"> <br>
        <input type="text" name="nom" placeholder="nom"> <br>
        <input type="text" name="prenom" placeholder="Prenom"> <br>
        <input type="text" name="adresse" placeholder="adresse"> <br>
        <input type="text" name="codePostal" pattern="[0-9]*" placeholder="code postal"> <br>
        <input type="text" name="ville" placeholder="ville"> <br>
        <input type="text" name="numeroDeTelephone" placeholder="numero de telephone"> <br>
        <input type="email" name="email" placeholder="email"> <br>
        <select name="enterprise_id" form="addcollab">
        @foreach($enterprises as $enterprise)
            <option value="{{$enterprise->id}}">{{$enterprise->nom}}</option>
        @endforeach
        </select><br>
        <button type="submit">Ajouter</button>
    </form>

@endsection
