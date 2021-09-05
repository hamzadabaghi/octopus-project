@extends('layouts.prof')

@section('membre')
class="active"
@endsection

@section('num')
@if($num > 0)
    {{ $num }}
@endif
@endsection

@section('profile')
{{ $user->image }}
@endsection

@section('nomComplet')
{{ $user->name }} {{ $user->prenom }}
@endsection

@section('specialite')
{{ $user->specialite }}
@endsection

@section('content')

    <div class="container">

        <div class="notice notice-success" style="margin-bottom: 50px;">
            <strong>Ajout des Membres</strong>
        </div>

@error('email')
<div class="flag note note--error">
  <div class="flag__image note__icon">
    <i class="fa fa-times"></i>
  </div>
  <div class="flag__body note__text">
    {{ $message }}
  </div>
  <a href="#" class="note__close">
    <i class="fa fa-times"></i>
  </a>
</div>
@enderror

        <form action="{{ route('addMembre2') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="nom">Nom :</label>
              <input type="text" required class="form-control" id="nom" placeholder="Entrer le nom" name="name" value="{{ old("name") }}">
            </div>
            <div class="form-group">
              <label for="prenom">Prenom :</label>
              <input type="text" required class="form-control" id="prenom" placeholder="Entrer le prenom" name="prenom" value="{{ old("prenom") }}">
            </div>
            <div class="form-group">
              <label for="dateNaissance">Date de naissance :</label>
              <input type="date" required class="form-control" id="dateNaissance" placeholder="Entrer la dateNaissance" name="dateN" value="{{ old("dateN") }}">
            </div>
            <div class="form-group">
              <label for="adresse">Telephone :</label>
              <input type="tel"  required class="form-control" id="adresse" placeholder="Entrer le téléphone" name="telephone" value="{{ old("telephone") }}">
            </div>
            <div class="form-group">
                <label for="adresse">Specialite :</label>
                <br/>
                <select name="specialite" id="specialite" class="custom-select" tabindex="-1"
                id="select-name">
                    <option value="Chirurgien">Chirurgien</option>
                    <option value="Oncologue">Oncologue</option>
                    <option value="ORL">ORL</option>
                    <option value="radiothérapeute">Radiothérapeute</option>
                    <option value="Médecine nucléaire">Médecine nucléaire</option>
                    <option value="Radiologue">Radiologue</option>
                    <option value="Anatomopathologiste">Anatomopathologiste</option>
                </select>
            </div>
            <div class="form-group">
                <label for="departement">Departement :</label>
                <br/>
                <select name="departement" id="departement" class="custom-select" tabindex="-1"
                id="select-name">
                    <option value="1">ORL</option>
                    <option value="2">Neurochirurgie</option>
                    <option value="3">Chirurgie Digestive</option>
                    <option value="4">Traumatologie</option>
                    <option value="5">Urologie</option>
                    <option value="6">Gynécologie</option>
                    <option value="7">Dermatologie</option>
                </select>

            </div>
            <div class="form-group">
                <label for="adresse">Email :</label>
                <input type="email" required class="form-control" id="adresse" placeholder="Entrer l'Email" name="email" value="{{ old("email") }}">
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                   <br>
                     <button class="btn bbt" type="submit">Ajouter</button>
                     <a href="{{ route('membre') }}" class="btn bbt1">Annuler</a>
              </div>
            </div>
        </form>

    </div>
<!--end team-->
@endsection
