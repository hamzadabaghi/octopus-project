@extends('layouts.prof')

@section('profil')
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

 <!--notice-->
 <div class="container">
          <div class="notice notice-success">
            <strong>Modification du Profile</strong>
          </div>
        </div>

        @if(session('erreur'))
          <div class="flag note note--error">
            <div class="flag__image note__icon">
              <i class="fa fa-times"></i>
            </div>
            <div class="flag__body note__text">
                {{ session('erreur') }}
            </div>
            <a href="#" class="note__close">
              <i class="fa fa-times"></i>
            </a>
          </div>
        @endif

        @error('password')
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
        @endif



        <!--profile-->
        <div class="container bootstrap snippet">
            <div class="row" style="margin-top:40px;">

                <div class="col-sm-12">

                  <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                    <form class="form" action="{{ route('editerP') }}" method="POST" enctype="multipart/form-data" id="registrationForm" >
                            @csrf

                            <div class="row">
                              <div class="form-group col col-lg-3 text-center">
                                <img src="/storage/images/{{$user->image}}" class="avatar img-circle img-thumbnail" alt="avatar" name="profilimage">
                                <h6>Charger une photo  ...</h6>
                                <input type="file" name="image"  style="font-size: 11px; width: 250px; border: none; background-color: #bebebe;" class="btn btn-info file-upload" >
                              </div></hr><br>

                              <div class="col-9">
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="first_name"><h5>Nom</h5></label>
                                            <input type="text" class="form-control" name="name" required id="first_name" placeholder="Entrez votre Nom" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="last_name"><h5>Prenom</h5></label>
                                            <input type="text" class="form-control" name="prenom" required id="last_name" placeholder="Entrez votre Prenom" value="{{ $user->prenom }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="phone"><h5>Telephone</h5></label>
                                            <input type="text" class="form-control" name="telephone" required id="phone" placeholder="Entrez votre Numero du Telephone" value="{{ $user->telephone }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email"><h5>Email</h5></label>
                                            <input type="email" class="form-control" name="email" required id="email" placeholder="Entrez votre Email" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="password"><h5>Ancien Mot de Passe</h5></label>
                                            <input type="password" class="form-control" name="password0" required id="password" placeholder="Entrez votre Ancien Mot de Passe">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="password"><h5>Nouveau Mot de Passe</h5></label>
                                            <input type="password" class="form-control" name="password" required id="password" placeholder="Entrez votre Nouveau Mot de Passe">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="password2"><h5>Mot de Passe de Confirmation</h5></label>
                                            <input type="password" class="form-control" name="password2" required id="password2" placeholder="Confirmez votre Mot de Passe">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                                <br>
                                                <button class="btn bbt" type="submit">Enregistrer</button>
                                                <a href="{{ route('profil') }}" class="btn bbt1">Annuler</a>
                                            </div>
                                    </div>
                            </div>
                        </div>
                          </form>

                      <hr>

                     </div>
                     </div>
                     </div>
                    </div>
                    </div>

  <!--end profile-->
  <script>
  $(document).ready(function() {


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function(){
        readURL(this);
    });
});
</script>



@endsection
