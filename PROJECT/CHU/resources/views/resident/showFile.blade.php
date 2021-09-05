@extends('layouts.resident')

@section('content')


<!---->
<style>
    .retour:hover{
      border-bottom: 2px solid;
    }
  </style>

<!--pager-->
<ul class="breadcrumb" style="background-color:#c1e3e8;">

    <li class="breadcrumb-item active" style="color:rgb(224, 26, 59); font-weight:bold;"> <img src="/img/back.png"> <a href="{{ route('patientsR') }}" style="color: #545452;" class="retour"><strong>Retour</strong></a>
        </li>
  </ul>
<!--finpager-->
  <div class="container">
      <div class="notice notice-success">
      <strong> {{ $dossier->nomP }} {{ $dossier->prenomP }} <span style="color: red;">|</span> IP : {{ $dossier->ip }}</strong>
      </div>
  </div>




<!--notice de validation-->

@if (session('erreurResident'))
  <div class="flag note note--error">
    <div class="flag__image note__icon">
    <i class="fa fa-times"></i>
    </div>
    <div class="flag__body note__text">
      {{ session('erreurResident') }}
    </div>
    <a href="#" class="note__close">
    <i class="fa fa-times"></i>
    </a>
</div>
@endif
<!--fin alert-->

<!--notice d'erreur des infos de medecin -->
@if (session('message'))
  <div class="flag note note--success">
      <div class="flag__image note__icon">
        <i class="fa fa-check"></i>
      </div>
      <div class="flag__body note__text">
        {{ session('message') }}
      </div>
      <a href="#" class="note__close">
        <i class="fa fa-times"></i>
      </a>
  </div>
@endif


<!--end notice-->
<div class="row justify-content-center">

  <div class="col-lg-10 ">

              @if($indice != null)
                @if($mess != 'pret')
                  <div class="d-flex justify-content-center mt-3">
                    <div class="flag note note--info">
                      <div class="flag__image note__icon">
                        <i class="fa fa-info"></i>
                      </div>
                      <div class="flag__body note__text">
                        <span id="message"></span>
                      </div>
                      <a href="#" class="note__close">
                        <i class="fa fa-times"></i>
                      </a>
                    </div>
                  </div>
                @else
                <div class="d-flex justify-content-center mt-3">
                    <div class="flag note note--success">
                        <div class="flag__image note__icon">
                          <i class="fa fa-check"></i>
                        </div>
                        <div class="flag__body note__text">
                          <span id="message"></span>
                        </div>
                        <a href="#" class="note__close">
                          <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                @endif
              @else
              <div class="d-flex justify-content-center mt-3">
                <div class="flag note note--warning">
                  <div class="flag__image note__icon">
                    <i class="fa fa-exclamation"></i>
                  </div>
                  <div class="flag__body note__text">
                    Si vous enverrez le dossier à la RCP, vous ne pouvez plus le modifier ou le supprimer !!
                  </div>
                  <a href="#" class="note__close">
                    <i class="fa fa-times"></i>
                  </a>
                </div>
              </div>
              @endif


          <div class="d-flex justify-content-center" style="margin-top:20px;">



           <div style="margin-right:5px;">
            <button class="btn icon-btn btn-info" data-toggle="modal" data-target="#myModal1"  style="color:white;" id="modifier">
              <svg class="bi bi-person-plus-fill" width="1em" height="1em"
                    viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm7.5-3a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13V5.5a.5.5 0 01.5-.5z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M13 7.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z"
                        clip-rule="evenodd" />
                </svg>
                Modifier</button>
          </div>

          <div style="margin-left:5px;">
            <button class="btn icon-btn btn-warning" id="imprimer" onclick="window.location.href = '{{ route('createPDF_R', ['idDossier' => $dossier->id]) }}';"><svg class="bi bi-download" width="1em" height="1em"
                    viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M.5 8a.5.5 0 01.5.5V12a1 1 0 001 1h12a1 1 0 001-1V8.5a.5.5 0 011 0V12a2 2 0 01-2 2H2a2 2 0 01-2-2V8.5A.5.5 0 01.5 8z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd"
                        d="M5 7.5a.5.5 0 01.707 0L8 9.793 10.293 7.5a.5.5 0 11.707.707l-2.646 2.647a.5.5 0 01-.708 0L5 8.207A.5.5 0 015 7.5z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M8 1a.5.5 0 01.5.5v8a.5.5 0 01-1 0v-8A.5.5 0 018 1z"
                        clip-rule="evenodd" />
                </svg>
                Imprimer
              </button>
          </div>

          <div style="margin-left:5px;">
                <button class="btn icon-btn btn-success" data-toggle="modal" data-target="#myModal2" id="rcp">
                  <svg class="bi bi-cursor-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14.082 2.182a.5.5 0 01.103.557L8.528 15.467a.5.5 0 01-.917-.007L5.57 10.694.803 8.652a.5.5 0 01-.006-.916l12.728-5.657a.5.5 0 01.556.103z" clip-rule="evenodd"/>
                  </svg> RCP</button>
          </div>

          <div style="margin-left:5px;">
                <button class="btn icon-btn btn-danger" style="color:white;"  data-toggle="modal" data-target="#myModal3" id="supprimer">
                    <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 00-1 1v1a1 1 0 001 1H3v9a2 2 0 002 2h6a2 2 0 002-2V4h.5a1 1 0 001-1V2a1 1 0 00-1-1H10a1 1 0 00-1-1H7a1 1 0 00-1 1H2.5zm3 4a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7a.5.5 0 01.5-.5zM8 5a.5.5 0 01.5.5v7a.5.5 0 01-1 0v-7A.5.5 0 018 5zm3 .5a.5.5 0 00-1 0v7a.5.5 0 001 0v-7z" clip-rule="evenodd"/>
                      </svg>
                      Supprimer</button>
          </div>

<!--************************************TRAITEMENT DES BOUTTONS*********************************************-->


          @if($indice != null)
            <script>
              document.getElementById('modifier').disabled = true;
              document.getElementById('rcp').disabled = true;
              document.getElementById('supprimer').disabled = true;
            </script>
            @if($mess != 'pret')
              <script>
                document.getElementById('imprimer').disabled = true;
                document.getElementById('message').innerHTML = 'La RCP n\'est pas encore terminée, quand elle sera terminée, vous pourrez télécharger le rapport !!';
              </script>
            @else
              <script>
                document.getElementById('imprimer').disabled = false;
                document.getElementById('message').innerHTML = 'La RCP est terminée , maintenant vous pouvez télécharger le rapport !!';
              </script>
            @endif
          @else
            <script>
              document.getElementById('imprimer').disabled = true;
            </script>
          @endif





<!--********************************************************************************************************-->


      <!--  </p> -->


    </div>




<!--info-->
<div class="card bg-light d-flex justify-content-center" style="margin-top:30px;">
    <div class="card-body ">


              <table id="customers">
                  <tr>
                    <th>Champ</th>
                    <th>Donnee</th>
                  </tr>
                  <!--part1 commun-->
                  <tr>
                    <td>IP du Patient</td>
                    <td>{{ $dossier->ip }}  </td>
                  </tr>
                  <tr>
                      <td>Nom du Patient</td>
                      <td>{{ $dossier->nomP }}  </td>
                    </tr>
                    <tr>
                      <td>Prenom du Patient</td>
                      <td>{{ $dossier->prenomP }}  </td>
                    </tr>
                    <tr>
                      <td>Date de Naissance du Patient</td>
                      <td>{{ $dossier->dateN }}  </td>
                    </tr>
                    <tr>
                      <td>Sexe du Patient</td>
                      <td>{{  $dossier->sexe  }} </td>
                    </tr>
                    <tr>
                      <td>Cancer</td>
                      <td>{{ $dossier->cancer }}  </td>
                    </tr>
                    <!--fin part1 commun-->
                    <!--part1 non commun-->
                    @if($dossier->cancer == "Cavite Orale" )
                    <tr>
                      <td>Localisation</td>
                      <td>{{  $dossier->localisation  }}</td>
                    </tr>
                    @endif
                    <!--fin part1 non commun-->
                    <!--part2 commun-->
                    <tr>
                      <td>Type Histologique</td>
                      <td>{{  $dossier->TypeHt  }}</td>
                    </tr>
                    <tr>
                      <td>Facteurs Mauvais Pronostic</td>
                      <td>
                          @if(is_array($dossier->FMP))
                          @foreach ( $dossier->FMP as $FMP )
                          {{ $FMP }}
                          <br/>
                      @endforeach
                        @else {{ $dossier->FMP }}
                        @endif
                  </td>
                  <!--fin part2 commun-->
                  <!--part2  non commun-->
                    </tr>
                    @if($dossier->cancer == "Oropharynx"  )
                    <tr>
                      <td>p16</td>
                      <td>p16 : {{ $dossier->p16 }}
                      </td>
                    </tr>
                    @endif

                    @if($dossier->cancer != "Larynx"  )
                    <tr>
                      <td>cTNM</td>
                      <td>{{ ($dossier->cancer =="Cavite Orale")? "T" : "cT" }} : {{  $dossier->cT }}
                          <br/>
                          {{ ($dossier->cancer =="Cavite Orale")? "N" : "cN" }} : {{ $dossier->cN }}
                          <br/>
                          M : {{ $dossier->M }}

                      </td>
                    </tr>
                    <tr>
                      <td>pTNM</td>
                      <td>{{ ($dossier->cancer =="Cavite Orale")? "T" : "pT" }} : {{ $dossier->pT }}
                          <br/>
                          {{ ($dossier->cancer =="Cavite Orale")? "N" : "pN" }} : {{ $dossier->pN }}
                          </td>
                    </tr>
                    @endif

                    @if($dossier->cancer == "Larynx"  )
                    <tr>
                      <td>cTNM</td>
                      <td>Tumeurs supraglottiques : {{ $dossier->cTumeurs_supraglottiques }}
                          <br/>
                          Tumeurs sous glottiques : {{ $dossier->cTumeurs_sous_glottiques }}
                          <br/>
                          Tumeurs glottiques : {{ $dossier->cTumeurs_glottiques }}
                          <br/>
                          cN : {{ $dossier->cN }}
                          <br/>
                          M : {{ $dossier->M }}
                      </td>
                    </tr>
                    <tr>
                      <td>pTNM</td>
                      <td>Tumeurs supraglottiques : {{ $dossier->pTumeurs_supraglottiques }}
                          <br/>
                          Tumeurs sous glottiques : {{ $dossier->pTumeurs_sous_glottiques }}
                          <br/>
                          Tumeurs glottiques : {{ $dossier->pTumeurs_glottiques }}
                          <br/>
                          pN : {{ $dossier->pN }}
                          <br/>
                      </td>
                    </tr>
                    @endif

                    <!--fin part2 non commun-->
                    <!--part3 commun-->
                    <tr>
                      <td>Contre Indication à la Chirurgie</td>
                      <td>@if(is_array($dossier->CIChirurgie))
                          @foreach ( $dossier->CIChirurgie as $CIChirurgie )
                          {{ $CIChirurgie }}
                          <br/>
                          @endforeach
                          @else
                          {{ $dossier->CIChirurgie }} @endif</td>

                    </tr>
                    <tr>
                      <td>Contre Indication à la Chimiothérapie</td>
                      <td>@if(is_array($dossier->CIChimiotherapie))
                          @foreach ( $dossier->CIChimiotherapie as $CIChimiotherapie )
                          {{ $CIChimiotherapie }}
                          <br/>
                          @endforeach
                          @else
                          {{ $dossier->CIChimiotherapie }} @endif</td>
                    </tr>
                    <tr>
                      <td>Contre Indication à la Radiothérapie</td>
                      <td>@if(is_array($dossier->CIRadiotherapie))
                          @foreach ( $dossier->CIRadiotherapie as $CIRadiotherapie )
                          {{ $CIRadiotherapie }}
                          <br/>
                          @endforeach
                          @else
                          {{ $dossier->CIRadiotherapie }} @endif</td>
                    </tr>

                    @if( $dossier->Rechute !=null )
                    <tr>
                        <td>Rechute</td>
                        <td> @if(is_array($dossier->Rechute))
                        @foreach ($dossier->Rechute as $Rechute)
                        @if($Rechute == "Rechute") @continue @elseif($Rechute == "RECHUTE_T") Rechute sur T <br/> @elseif($Rechute == "RECHUTE_N") Rechute sur N <br/> @endif
                        @endforeach
                        @else
                        {{ $dossier->Rechute }}
                        @endif</td>
                    </tr>
                    @endif
                    @if( $dossier->chimiotherapie_premiere !=null )
                    <tr>
                        <td>Resultat de la Chimiothérapie première</td>
                        <td>Reponse incomplète ou progression</td>
                    </tr>
                    @endif

                    @if(($dossier->resultat_premier_traitement) !=null )
                    <tr>
                        <td>Resultat du 1er Traitement</td>
                        <td> @if(is_array($dossier->resultat_premier_traitement))
                        @foreach ($dossier->resultat_premier_traitement as $resultat_premier_traitement)
                         @if($resultat_premier_traitement == "NON_REPONSE") Echec du 1er Traitement <br/>  @elseif($resultat_premier_traitement == "RELIQUAT_T") Reliquat sur T <br/> @elseif($resultat_premier_traitement == "RELIQUAT_N") Reliquat sur N <br/> @endif
                        @endforeach
                        @else
                        {{ $dossier->resultat_premier_traitement }}
                        @endif</td>
                    </tr>
                    @endif

                    <tr>
                      <td>Message Joint</td>
                      <td>{{ ($dossier->message != null) ? $dossier->message: 'rien' }}
                        </td>
                    </tr>

                    <tr>
                        <td>Professeur</td>
                        <td>@foreach ($professeur as $professeur)
                          @if($dossier->professeurMessage == $professeur->id)
                            {{ $professeur->name }} {{ $professeur->prenom }}
                            @break
                          @elseif($dossier->professeurMessage == '0')
                              tous les professeurs
                              @break
                          @elseif($dossier->professeurMessage == '-1')
                              rien
                              @break
                          @endif
                        @endforeach</td>
                    </tr>
                    <!--fin part3 commun-->




                </table>

    </div>
  </div>
</div>
</div>


<!--verification de resident pour modification-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h4>Verification d'identité</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" style="color: red;">×</span>
      </button>

      <h4 class="modal-title" id="myModalLabel"></h4>
    </div>
    <div class="modal-body">
      <!--formulaire-->
      <form  method="POST" action="{{ route('beforeUpdateFile',[$dossier->id]) }}" class="form-horizontal">
        @csrf
        <fieldset>

            <!---->
            <div class="form-group">
                <label for="nomR">Nom :</label>
                <input type="text" class="form-control @error ('nomR') is-danger @enderror" id="nomR"
                    placeholder="Entrer le nom" name="nomR" value="{{ old('nomR') }}" required/>
            </div>
            @error('nomR')

            <p class="help is-danger" style="color:red;">{{ $errors->first('nomR') }}</p>
            @enderror
            <div class="form-group">
                <label for="prenomR">Prenom :</label>
                <input type="text" class="form-control @error ('prenomR') is-danger @enderror" id="prenomR"
                    placeholder="Entrer le prenom" name="prenomR" value="{{ old('prenomR') }}" required/>
            </div>
            @error('prenomR')

            <p class="help is-danger" style="color:red;">{{ $errors->first('prenomR') }}</p>
            @enderror

            <div class="form-group">
                <label for="cin"> Cin :</label>
                <input type="text" class="form-control @error ('cin') is-danger @enderror" id="cin"
                    placeholder="Entrer le Cin" name="cin" value="{{ old('cin') }}" required/>
            </div>
            @error('cin')

            <p class="help is-danger" style="color:red;">{{ $errors->first('cin') }}</p>
            @enderror

        <!--fin formulaire-->
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success">Valider</button>

    </form>
    <button class="btn btn-primary" data-dismiss="modal">
        Annuler
      </button>
    </div>
  </div>
</div>
</div>
<!--toggle model-->


<!--verification de resident pour rcp -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h4>Verification d'identité</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" style="color: red;">×</span>
      </button>

      <h4 class="modal-title" id="myModalLabel"></h4>
    </div>
    <div class="modal-body">
      <!--formulaire-->
      <form  action="{{ route('sendRCP',[$dossier->id]) }}" method="POST" class="form-horizontal" >
        @csrf

        <fieldset>

            <!---->
            <div class="form-group">
                <label for="nomR">Nom :</label>
                <input type="text" class="form-control @error ('nomR') is-danger @enderror" id="nomR"
                    placeholder="Entrer le nom" name="nomR" value="{{ old('nomR') }}" required/>
            </div>
            @error('nomR')

            <p class="help is-danger" style="color:red;">{{ $errors->first('nomR') }}</p>
            @enderror
            <div class="form-group">
                <label for="prenomR">Prenom :</label>
                <input type="text" class="form-control @error ('prenomR') is-danger @enderror" id="prenomR"
                    placeholder="Entrer le prenom" name="prenomR" value="{{ old('prenomR') }}" required/>
            </div>
            @error('prenomR')

            <p class="help is-danger" style="color:red;">{{ $errors->first('prenomR') }}</p>
            @enderror

            <div class="form-group">
                <label for="cin"> Cin :</label>
                <input type="text" class="form-control @error ('cin') is-danger @enderror" id="cin"
                    placeholder="Entrer le Cin" name="cin" value="{{ old('cin') }}" required/>
            </div>
            @error('cin')

            <p class="help is-danger" style="color:red;">{{ $errors->first('cin') }}</p>
            @enderror

            <!---->

            <p> <strong style="color:green;margin-top:5px;">* la validation confirme l'envoi à la RCP</strong></p>

      <!--fin formulaire-->
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success">Valider</button>

    </form>
    <button class="btn btn-primary" data-dismiss="modal">
        Annuler
      </button>
    </div>
  </div>
</div>
</div>
<!--toggle model-->


<!--verification de resident pour suppression-->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h4>Verification d'identité</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" style="color: red;">×</span>
      </button>

      <h4 class="modal-title" id="myModalLabel"></h4>
    </div>
    <div class="modal-body">
      <!--formulaire-->
      <form  method="POST" action="{{ route('deleteFile',[$dossier->id]) }}" class="form-horizontal" >
        @csrf

        <fieldset>

            <!---->
            <div class="form-group">
                <label for="nomR">Nom :</label>
                <input type="text" class="form-control @error ('nomR') is-danger @enderror" id="nomR"
                    placeholder="Entrer le nom" name="nomR" value="{{ old('nomR') }}" required/>
            </div>
            @error('nomR')

            <p class="help is-danger" style="color:red;">{{ $errors->first('nomR') }}</p>
            @enderror
            <div class="form-group">
                <label for="prenomR">Prenom :</label>
                <input type="text" class="form-control @error ('prenomR') is-danger @enderror" id="prenomR"
                    placeholder="Entrer le prenom" name="prenomR" value="{{ old('prenomR') }}" required/>
            </div>
            @error('prenomR')

            <p class="help is-danger" style="color:red;">{{ $errors->first('prenomR') }}</p>
            @enderror

            <div class="form-group">
                <label for="cin"> Cin :</label>
                <input type="text" class="form-control @error ('cin') is-danger @enderror" id="cin"
                    placeholder="Entrer le Cin" name="cin" value="{{ old('cin') }}" required/>
            </div>
            @error('cin')

            <p class="help is-danger" style="color:red;">{{ $errors->first('cin') }}</p>
            @enderror

            <!---->

            <p> <strong style="color:red;margin-top:5px;font-size:1.2em">Voulez-vous vraiment supprimer ce dossier ?</strong></p>


      <!--fin formulaire-->
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success">Oui</button>

    </form>
    <button class="btn btn-danger" data-dismiss="modal">
        Non
      </button>
      <button class="btn btn-secondary" data-dismiss="modal">
        Annuler
      </button>
    </div>
  </div>
</div>
</div>
<!--toggle model-->


@endsection
