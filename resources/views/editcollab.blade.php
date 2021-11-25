@extends('layouts.default')

@section('title')
    Editeur
@endsection

@section('body')

    <h1>Modifier le collaborateur</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="updateform/{{ $collab->id }}" method="POST" id="editcollab">
        @csrf
        <input type="text" name="civilite" value="{{$collab->civilite}}" placeholder="civilite"> <br>
        <input type="text" name="nom" value="{{$collab->nom}}" placeholder="nom"> <br>
        <input type="text" name="prenom" value="{{$collab->prenom}}" placeholder="prenom"> <br>
        <input type="text" name="adresse" value="{{$collab->adresse}}" placeholder="adresse"> <br>
        <input type="text" name="codePostal" pattern="[0-9]*" value="{{$collab->codePostal}}" placeholder="code postal"> <br>
        <input type="text" name="ville" value="{{$collab->ville}}" placeholder="ville"> <br>
        <input type="text" name="numeroDeTelephone" value="{{$collab->numeroDeTelephone}}" placeholder="numero de telephone"> <br>
        <input type="email" name="email" value="{{$collab->email}}" placeholder="email"> <br>
        <select name="enterprise_id" form="editcollab">
            @foreach($enterprises as $enterprise)
                @if($collab->enterprise_id == $enterprise->id)
                    <option selected="selected"value="{{$enterprise->id}}">{{$enterprise->nom}}</option>
                @else
                    <option value="{{$enterprise->id}}">{{$enterprise->nom}}</option>
                @endif
            @endforeach
        </select><br>
        <button type="submit">Editer</button>
    </form>

@endsection
