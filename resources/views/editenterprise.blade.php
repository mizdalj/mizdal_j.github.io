@extends('layouts.default')

@section('title')
    Editeur
@endsection

@section('body')

<h1>Modifier l'entreprise</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="updateform/{{ $enterprise->id }}" method="POST">
    @csrf
    <input type="text" name="nom" value="{{$enterprise->nom}}" placeholder="nom"> <br>
    <input type="text" name="adresse" value="{{$enterprise->adresse}}" placeholder="adresse"> <br>
    <input type="text" name="codePostal" value="{{$enterprise->codePostal}}" placeholder="code postal"> <br>
    <input type="text" name="ville" value="{{$enterprise->ville}}" placeholder="ville"> <br>
    <input type="text" name="numeroDeTelephone" value="{{$enterprise->numeroDeTelephone}}" placeholder="numero de telephone"> <br>
    <input type="email" name="email" value="{{$enterprise->email}}" placeholder="email"> <br>
    <button type="submit">Modifier</button>
</form>

@endsection
