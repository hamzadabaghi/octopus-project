@extends('layouts.prof')

@section('rcp')
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
<!--notice-->
<div class="container">
  <div class="notice notice-success">
  <strong>Dossier : {{  $dossier->nomP }} {{ $dossier->prenomP }} </strong>
  </div>
</div>


<div class="tabbed">
  <input type="radio" name="tabs" id="tab-nav-1" checked>
  <label for="tab-nav-1">RESIDENT</label>
  <input type="radio" name="tabs" id="tab-nav-2">
  <label for="tab-nav-2">PATIENT</label>
  <input type="radio" name="tabs" id="tab-nav-3">
  <label for="tab-nav-3">CANCER</label>
  <input type="radio" name="tabs" id="tab-nav-4">
  <label for="tab-nav-4">DECISION</label>
  <input type="radio" name="tabs" id="tab-nav-5">
  <label for="tab-nav-5">RAPPORT</label>
  <div class="tabs">

    <div><h2>RESIDENT</h2>
      <ul>
        <li><strong>Nom du Résident : </strong>{{  $dossier->nomR }}</li>
        <li><strong>Prenom du Résident : </strong>{{ $dossier->prenomR }}</li>
        <li><strong>Cin du Résident : </strong>{{ $dossier->cin }}</li>
        @if($dossier->professeurMessage == $user->id || $dossier->professeurMessage =='0')
        <li><strong>Message joint : {{ $dossier->message }}</strong></li>
        @endif
      </ul>
    </div>

    <div><h2>PATIENT</h2>
      <ul>
        <li><strong>IP du Patient : </strong>{{ $dossier->ip }}</li>
        <li><strong>Nom du Patient : </strong>{{ $dossier->nomP }}</li>
        <li><strong>Prenom du Patient : </strong>{{ $dossier->prenomP }}</li>
        <li><strong>Date de Naissance du Patient : </strong>{{ $dossier->dateN }}</li>
      </ul>
    </div>

    <div><h2>CANCER</h2>
      <ul>
        <li><strong>Cancer : </strong>{{ $dossier->cancer }}</li>
        @if($dossier->cancer=='Cavite Orale')
          <li><strong>Localisation du Cancer: </strong>{{  $dossier->localisation  }}</li>
        @endif
        <li><strong>Type Histologique : </strong>{{  $dossier->TypeHt  }}</li>
        <li><strong>Facteurs Mauvais Pronostic : </strong>
          <ol>
              @if(is_array($dossier->FMP))
                @foreach ( $dossier->FMP as $FMP )
                <li>{{ $FMP }}</li>
                @endforeach
              @else {{ $dossier->FMP }}
              @endif
          </ol>
        </li>
        @if($dossier->cancer != "Larynx")
          <li><strong>cTNM : </strong>
            <ul>
              @if($dossier->cancer == "Oropharynx"  )
                <li>p16 : {{ $dossier->p16 }}</li>
              @endif
              <li>{{ ($dossier->cancer =="Cavite Orale")? "T" : "cT" }} : {{ $dossier->cT }}</li>
              <li>{{ ($dossier->cancer =="Cavite Orale")? "N" : "cN" }} : {{ $dossier->cN }}</li>
              <li>M : {{ $dossier->M }}</li>
            </ul>
          </li>
          <li><strong>pTNM : </strong>
            <ul>
              <li>{{ ($dossier->cancer =="Cavite Orale")? "T" : "pT" }} : {{ $dossier->pT }}</li>
              <li>{{ ($dossier->cancer =="Cavite Orale")? "N" : "pN" }} : {{ $dossier->pN }}</li>
            </ul>
          </li>
        @endif
    @if($dossier->cancer == "Larynx"  )
      <li>
        <strong>cTNM : </strong>
        <ul>
          <li>Tumeurs supraglottiques : {{ $dossier->cTumeurs_supraglottiques }}</li>

          <li> Tumeurs sous glottiques : {{ $dossier->cTumeurs_sous_glottiques }}</li>

          <li> Tumeurs glottiques : {{ $dossier->cTumeurs_glottiques }}</li>

          <li> cN : {{ $dossier->cN }} </li>

          <li> M : {{ $dossier->M }} </li>
        </ul>
      </li>

      <li>
        <strong>pTNM : </strong>
        <ul>
          <li>Tumeurs supraglottiques : {{ $dossier->pTumeurs_supraglottiques }}</li>

          <li> Tumeurs sous glottiques : {{ $dossier->pTumeurs_sous_glottiques }}</li>

          <li> Tumeurs glottiques : {{ $dossier->pTumeurs_glottiques }}</li>

          <li> pN : {{ $dossier->pN }} </li>
        </ul>
      </li>
    @endif

        <li>
              @if(is_array($dossier->CIChirurgie))
                <strong>Contre Indication à la Chirurgie : </strong>
                <ul>
                  @foreach ( $dossier->CIChirurgie as $CIChirurgie )
                    <li>{{ $CIChirurgie }}</li>
                  @endforeach
                </ul>
              @else
                @if($dossier->CIChirurgie == 'la Chirurgie est possible')
                  <strong class="text-danger">{{ __('Chirurgie est possible !!') }}</strong>
                @else
                  <strong>Contre Indication à la Chirurgie : </strong>
                  <ul>
                    <li>{{ $dossier->CIChirurgie }}</li>
                  </ul>
                @endif
              @endif
        </li>

        <li>
          @if(is_array($dossier->CIChimiotherapie))
            <strong>Contre Indication à la Chimiothérapie : </strong>
            <ul>
              @foreach ( $dossier->CIChimiotherapie as $CIChimiotherapie )
                <li>{{ $CIChimiotherapie }}</li>
              @endforeach
            </ul>
          @else
            @if($dossier->CIChimiotherapie == 'la Chimiotherapie est possible')
              <strong class="text-danger">{{ __('Chimiothérapie est possible !!') }}</strong>
            @else
              <strong>Contre Indication à la Chimiothérapie : </strong>
              <ul>
                <li>{{ $dossier->CIChimiotherapie }}</li>
              </ul>
            @endif
          @endif
        </li>

        <li>
          @if(is_array($dossier->CIRadiotherapie))
            <strong>Contre Indication à la Radiothérapie : </strong>
            <ul>
              @foreach ( $dossier->CIRadiotherapie as $CIRadiotherapie )
                <li>{{ $CIRadiotherapie }}</li>
              @endforeach
            </ul>
          @else
            @if($dossier->CIRadiotherapie == 'la radiotherapie est possible')
              <strong class="text-danger">{{ __('Radiothérapie est possible !!') }}</strong>
            @else
              <strong>Contre Indication à la Radiothérapie : </strong>
              <ul>
                <li>{{ $dossier->CIRadiotherapie }}</li>
              </ul>
            @endif
          @endif
        </li>


        @if($dossier->resultat_premier_traitement != null)
        <li><strong>Resultat de premier Traitement : </strong>
            <ul>
                @if(in_array("RELIQUAT_N", $dossier->resultat_premier_traitement))<li>Reliquat sur N</li>@endif
                @if(in_array("RELIQUAT_T", $dossier->resultat_premier_traitement))<li>Reliquat sur T</li>@endif
            </ul>

            </li>
        @endif

        @if( $dossier->chimiotherapie_premiere !=null )
        <li><strong>Chimiotherapie premiere :</strong>
            <ul>
                <li>Reponse incomplète ou progression</li>
            </ul>
        </li>
        @endif
        @if( $dossier->Rechute !=null )
        <li><strong>Rechute : </strong>
                <ul>
                    @if(in_array("RECHUTE_N", $dossier->Rechute))<li>Rechute sur N</li>@endif
                    @if(in_array("RECHUTE_T", $dossier->Rechute))<li>Rechute sur T</li>@endif
                </ul>
        </li>
        @endif
      </ul>
    </div>






    <div><h2 style="margin-bottom: 0px;">DECISION</h2>

      @php ($jours = 15 - now()->diff($rcp->created_at)->d)

      @if($jours > 0 && $message != 'pret')

        @if($decPersonnelle == null)
           <br/>
          <span class="text-danger" style="margin-bottom: 30px;"> * (Cette RCP sera terminée pendant {{ $jours }} jours !!)</span>
          <form action="{{route('opinionProf', ['idDossier' => $dossier->id])}}" method="POST">
            @csrf
              <span style="margin-bottom: 10px; font-weight: bold; font-size: 18px;">Décisions de l'application:</span><br>
              @if(count($decision->decision) > 0)
                @foreach ($decision->decision as $item)
                  <label class="container chekingfacteur">{{$item}}
                    <input type="checkbox" name="decApp[]" value="{{$item}}">
                    <span class="checkmark checkmark1"></span>
                  </label>
                @endforeach
              @else
                  {{ __('(D\'après les données enregistrées du cancer du patient, l\'application n\'a généré aucune décision)') }}
              @endif
              <hr style="border-top: solid 2px #4EC6DE; margin-top: 30px;margin-bottom: 30px">
              <div class="form-group">
                <label for="decision"><span style="margin-bottom: 10px; font-weight: bold; font-size: 18px;">Autres décisions:</span></label>
                <input type="text" class="form-control" id="decision"
                    placeholder="Entrer votre décision"  name="decProf" />
                    <br/>
                <span class="text-danger"> * (Si vous envoyez votre décision personnelle, vous ne pouvez plus la modifier)</span>
              </div>
              <div class="mb-5">
                @if(!$opnsProfs->isEmpty())
                  @php ($drp = 0)
                  <hr style="border-top: solid 2px #4EC6DE; margin-top: 30px;margin-bottom: 30px">
                  <span style="margin-bottom: 10px; font-weight: bold; font-size: 18px; margin-bottom: 10px;">Décisions des autres professeurs:</span><br>
                  @foreach($opnsProfs as $opnsProf)
                    @if($opnsProf->opnProf != null)
                      @php ($drp = 1)
                      <label class="container chekingfacteur">
                        <span class="text-success">
                          @foreach($users as $user)
                            @if($user->id == $opnsProf->idProf)
                            Pr. {{ $user->name }} {{ $user->prenom }}:
                            @endif
                          @endforeach
                        </span>
                        {{ $opnsProf->opnProf }}
                        <input type="checkbox" name="opnAutresProfs[]" value="{{ $opnsProf->opnProf }}">
                        <span class="checkmark checkmark3"></span>
                      </label>
                    @endif
                  @endforeach
                  @if($drp == 0)
                      {{ __('(Actuellement aucun professeur n\'a donné sa décision personnelle)') }}
                  @endif
                @endif
            </div>
            <hr style="border-top: solid 2px #4EC6DE; margin-top: 30px;margin-bottom: 30px">
              <label class="container chekingfacteur"><span class="text-danger">RCP Presentielle</span>
                <input type="checkbox" name="RP" value="RCP Presentielle">
                <span class="checkmark checkmark2"></span>
              </label>
            <hr style="border-top: solid 2px #4EC6DE; margin-top: 30px;margin-bottom: 30px">
              <input type="submit" class="btn bbt-card" value="envoyer"><br>
          </form>

<!--*********************************************L'AFFICHAGE DES DECISIONS DES AUTRES PROFESSEURS SI $decPersonnelle == null**************************************************-->

          @if($opnsProfs->isEmpty())
            <h4>Actuellement, personne des autres professeurs n'a envoyé sa propre décision !!</h4>
          @else
            <h4>Voici les décisions actuelles des Professeurs :</h4>

            @foreach($opnsProfs as $opnsProf)
              <div class="decActuelle">

                  <h4>Pr.
                    @foreach($users as $user)
                      @if($user->id == $opnsProf->idProf)
                        {{ $user->name }} {{ $user->prenom }} <br> <span style="font-family: cairo; color: #424242;text-transform: uppercase; font-size: 20px;">
                                                                      "{{ $user->specialite }}"
                                                                  </span>
                      @endif
                    @endforeach
                  </h4>

                  @if($opnsProf->RP != 'RCP Presentielle')

                      <strong>Décisions cochées : </strong><br>
                      @if($opnsProf->opnApp != null)
                        @if(is_array($opnsProf->opnApp))
                          <ul>
                            @foreach ($opnsProf->opnApp as $item)
                                  <li style="color: rgb(243, 243, 243);font-size: 17px;">{{ $item }}</li>
                            @endforeach
                          </ul>
                        @else
                        <ul>
                          <li style="color: rgb(243, 243, 243);font-size: 17px;">{{ $opnsProf->opnApp }}</li>
                        </ul>
                        @endif
                      @else
                        <span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp;{{ __('(Aucune décision de l\'application n\'a été cochée)') }}</span>
                      @endif
                      <br>

                      <strong>Décision personnelle : </strong><br>
                      @if($opnsProf->opnProf != null)
                        <span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp; " {{ $opnsProf->opnProf }} "</span>
                      @else
                        <span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp; {{ __(' (Aucune décision personnelle)') }} </span>
                      @endif
                      <br>

                      <strong>Décisions cochées des autres professeurs : </strong>
                      @if($opnsProf->opnAutresProfs != null)
                        @if(is_array($opnsProf->opnAutresProfs))
                          <ul>
                            @foreach ($opnsProf->opnAutresProfs as $item)
                                  <li style="color: rgb(243, 243, 243);font-size: 17px;">
                                    <span style="color: #525252; font-weight: bold;">
                                      @foreach($opnsProfs as $opn)
                                        @if($opn->opnProf == $item)
                                          @foreach($users as $user)
                                            @if($user->id == $opn->idProf)
                                            Pr. {{ $user->name }} {{ $user->prenom }}:
                                            @endif
                                          @endforeach
                                        @endif
                                      @endforeach
                                    </span>
                                    " {{ $item }} "
                                  </li>
                            @endforeach
                          </ul>
                        @else
                          <ul>
                            <li style="color: rgb(243, 243, 243);font-size: 17px;">
                              <span style="color: #525252; font-weight: bold;">
                                @foreach($opnsProfs as $opn)
                                  @if($opn->opnProf == $opnsProf->opnAutresProfs)
                                    @foreach($users as $user)
                                      @if($user->id == $opn->idProf)
                                      Pr. {{ $user->name }} {{ $user->prenom }}:
                                      @endif
                                    @endforeach
                                  @endif
                                @endforeach
                              </span>
                              " {{ $opnsProf->opnAutresProfs }} "
                            </li>
                          </ul>
                        @endif
                      @else
                        <span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp;{{ __('(Aucune décision des autres professeurs n\'a été cochée)') }}</span>
                      @endif

                  @else
                      <strong>Décision personnelle : </strong><span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;{{ $opnsProf->RP }}</span>
                  @endif

              </div>
            @endforeach

          @endif
<!--****************************************************************************************************************************************************-->

        @else
                                <!--***********************************MESSAGE DE SUCCÈS************************************-->
                                          @if(session('mess'))
                                            <div class="flag note note--success">
                                              <div class="flag__image note__icon">
                                                <i class="fa fa-check"></i>
                                              </div>
                                              <div class="flag__body note__text">
                                                {{ session('mess') }}
                                              </div>
                                              <a href="#" class="note__close">
                                                <i class="fa fa-times"></i>
                                              </a>
                                            </div>
                                          @endif
                                <!--***************************************************************************************-->

          @if($message == 'pasEncore')
            @if($message2 == 'possible')
               <br/>
              <span class="text-danger" style="margin-bottom: 30px;"> * (Cette RCP sera terminée pendant {{ $jours }} jours !!)</span>
              <form action="{{route('modifierOpnProf', ['idDossier' => $dossier->id])}}" method="POST">
                @csrf
                  <span style="margin-bottom: 10px; font-weight: bold; font-size: 18px;">Décisions de l'application:</span><br>
                  @if(count($decision->decision) > 0)
                    @foreach ($decision->decision as $item)
                      <label class="container chekingfacteur">{{$item}}
                        <input type="checkbox" name="decApp[]" value="{{$item}}">
                        <span class="checkmark checkmark1"></span>
                      </label>
                    @endforeach
                  @else
                      {{ __('(D\'après les données enregistrées du cancer du patient, l\'application n\'a généré aucune décision)') }}
                  @endif
                  <hr style="border-top: solid 2px #4EC6DE; margin-top: 30px;margin-bottom: 30px">
                  <div class="form-group">
                    <label for="decision"><span style="margin-bottom: 10px; font-weight: bold; font-size: 18px;">Autres décisions:</span></label>
                    <input type="text" class="form-control" id="decision"
                        placeholder="Entrer votre décision"  name="decProf" />
                        <br/>
                    <span class="text-danger"> * (Si vous envoyez votre décision personnelle, vous ne pouvez plus la modifier)</span>
                  </div>
                  <div class="mb-5">
                    @if(!$opnsProfs->isEmpty())
                    @php ($drp = 0)
                    <hr style="border-top: solid 2px #4EC6DE; margin-top: 30px;margin-bottom: 30px">
                    <span style="margin-bottom: 10px; font-weight: bold; font-size: 18px; margin-bottom: 10px;">Décisions des autres professeurs:</span><br>
                    @foreach($opnsProfs as $opnsProf)
                      @if($opnsProf->opnProf != null)
                        @php ($drp = 1)
                        <label class="container chekingfacteur">
                          <span class="text-success">
                            @foreach($users as $user)
                              @if($user->id == $opnsProf->idProf)
                              Pr. {{ $user->name }} {{ $user->prenom }}:
                              @endif
                            @endforeach
                          </span>
                          {{ $opnsProf->opnProf }}
                          <input type="checkbox" name="opnAutresProfs[]" value="{{ $opnsProf->opnProf }}">
                          <span class="checkmark checkmark3"></span>
                        </label>
                      @endif
                    @endforeach
                    @if($drp == 0)
                        {{ __('(Actuellement aucun professeur n\'a donné sa décision personnelle)') }}
                    @endif
                  @endif
                </div>
                <hr style="border-top: solid 2px #4EC6DE; margin-top: 30px;margin-bottom: 30px">
                  <label class="container chekingfacteur"><span class="text-danger">RCP Presentielle</span>
                    <input type="checkbox" name="RP" value="RCP Presentielle">
                    <span class="checkmark checkmark2"></span>
                  </label>
                <hr style="border-top: solid 2px #4EC6DE; margin-top: 30px;margin-bottom: 30px">
                <input type="submit" class="btn btn-danger" value="modifier"><br>
                <small class="text-danger">Vous avez encore la possibilité de modifier votre décision tant que les Autres
                      professeurs n'ont pas encore envoyer leurs décisions.</small>
              </form>
            @endif

<!--******************************************************LA DECISION ACTUELLE DU PROF******************************************************************-->
              <div class="decActuelle">
                  <h4>Voici votre décision actuelle:</h4>

                  @if($decPersonnelle->RP != 'RCP Presentielle')

                      <strong>Décisions cochées : </strong><br>
                      @if($decPersonnelle->opnApp != null)
                        @if(is_array($decPersonnelle->opnApp))
                          <ul>
                            @foreach ($decPersonnelle->opnApp as $item)
                                  <li style="color: rgb(243, 243, 243);font-size: 17px;">{{ $item }}</li>
                            @endforeach
                          </ul>
                        @else
                        <ul>
                          <li style="color: rgb(243, 243, 243);font-size: 17px;">{{ $decPersonnelle->opnApp }}</li>
                        </ul>
                        @endif
                      @else
                        <span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp;{{ __('(Aucune décision de l\'application n\'a été cochée)') }}</span>
                      @endif
                      <br>

                      <strong>Décision personnelle : </strong><br>
                      @if($decPersonnelle->opnProf != null)
                        <span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp; " {{ $decPersonnelle->opnProf }} "</span>
                      @else
                        <span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp; {{ __(' (Aucune décision personnelle)') }} </span>
                      @endif
                      <br>

                      <strong>Décisions cochées des autres professeurs : </strong>
                      @if(!is_null($decPersonnelle->opnAutresProfs))
                        @if(is_array($decPersonnelle->opnAutresProfs))
                          <ul>
                            @foreach ($decPersonnelle->opnAutresProfs as $item)
                                  <li style="color: rgb(243, 243, 243);font-size: 17px;">
                                    <span style="color: #525252; font-weight: bold;">
                                      @foreach($opnsProfs as $opn)
                                        @if($opn->opnProf == $item)
                                          @foreach($users as $user)
                                            @if($user->id == $opn->idProf)
                                            Pr. {{ $user->name }} {{ $user->prenom }}:
                                            @endif
                                          @endforeach
                                        @endif
                                      @endforeach
                                    </span>
                                    " {{ $item }} "
                                  </li>
                            @endforeach
                          </ul>
                        @else
                          <ul>
                            <li style="color: rgb(243, 243, 243);font-size: 17px;">
                              <span style="color: #525252; font-weight: bold;">
                                @foreach($opnsProfs as $opn)
                                  @if($opn->opnProf == $decPersonnelle->opnAutresProfs)
                                    @foreach($users as $user)
                                      @if($user->id == $opn->idProf)
                                      Pr. {{ $user->name }} {{ $user->prenom }}:
                                      @endif
                                    @endforeach
                                  @endif
                                @endforeach
                              </span>
                              " {{ $decPersonnelle->opnAutresProfs }} "
                            </li>
                          </ul>
                        @endif
                      @else
                        <span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp;{{ __('(Aucune décision des autres professeurs n\'a été cochée)') }}</span>
                      @endif

                  @else
                      <strong>Décision personnelle : </strong><span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;{{ $decPersonnelle->RP }}</span>
                  @endif
              </div>



<!--*********************************************L'AFFICHAGE DES DECISIONS DES AUTRES PROFESSEURS SI $decPersonnelle != null**************************************************-->


              @if($opnsProfs->isEmpty())
              <h4>Actuellement, personne des autres professeurs n'a envoyé sa propre décision !!</h4>
              @else
              <h4>Voici les décisions actuelles des Professeurs :</h4>

              @foreach($opnsProfs as $opnsProf)
                <div class="decActuelle">

                    <h4>Pr.
                      @foreach($users as $user)
                        @if($user->id == $opnsProf->idProf)
                          {{ $user->name }} {{ $user->prenom }} <br> <span style="font-family: cairo; color: #424242;text-transform: uppercase; font-size: 20px;">
                                                                        "{{ $user->specialite }}"
                                                                    </span>
                        @endif
                      @endforeach
                    </h4>

                    @if($opnsProf->RP != 'RCP Presentielle')

                        <strong>Décisions cochées : </strong><br>
                        @if($opnsProf->opnApp != null)
                          @if(is_array($opnsProf->opnApp))
                            <ul>
                              @foreach ($opnsProf->opnApp as $item)
                                    <li style="color: rgb(243, 243, 243);font-size: 17px;">{{ $item }}</li>
                              @endforeach
                            </ul>
                          @else
                          <ul>
                            <li style="color: rgb(243, 243, 243);font-size: 17px;">{{ $opnsProf->opnApp }}</li>
                          </ul>
                          @endif
                        @else
                          <span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp;{{ __('(Aucune décision de l\'application n\'a été cochée)') }}</span>
                        @endif
                        <br>

                        <strong>Décision personnelle : </strong><br>
                        @if($opnsProf->opnProf != null)
                          <span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp; " {{ $opnsProf->opnProf }} "</span>
                        @else
                          <span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp; {{ __(' (Aucune décision personnelle)') }} </span>
                        @endif
                        <br>

                        <strong>Décisions cochées des autres professeurs : </strong>
                        @if($opnsProf->opnAutresProfs != null)
                          @if(is_array($opnsProf->opnAutresProfs))
                            <ul>
                              @foreach ($opnsProf->opnAutresProfs as $item)
                                    <li style="color: rgb(243, 243, 243);font-size: 17px;">
                                      <span style="color: #525252; font-weight: bold;">
                                        @foreach($opnsProfs as $opn)
                                          @if($opn->opnProf == $item)
                                            @foreach($users as $user)
                                              @if($user->id == $opn->idProf)
                                              Pr. {{ $user->name }} {{ $user->prenom }}:
                                              @endif
                                            @endforeach
                                          @endif
                                        @endforeach
                                      </span>
                                      " {{ $item }} "
                                    </li>
                              @endforeach
                            </ul>
                          @else
                            <ul>
                              <li style="color: rgb(243, 243, 243);font-size: 17px;">
                                <span style="color: #525252; font-weight: bold;">
                                  @foreach($opnsProfs as $opn)
                                    @if($opn->opnProf == $opnsProf->opnAutresProfs)
                                      @foreach($users as $user)
                                        @if($user->id == $opn->idProf)
                                        Pr. {{ $user->name }} {{ $user->prenom }}:
                                        @endif
                                      @endforeach
                                    @endif
                                  @endforeach
                                </span>
                                " {{ $opnsProf->opnAutresProfs }} "
                              </li>
                            </ul>
                          @endif
                        @else
                          <span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp;{{ __('(Aucune décision des autres professeurs n\'a été cochée)') }}</span>
                        @endif

                    @else
                        <strong>Décision personnelle : </strong><span style="color: rgb(243, 243, 243);font-size: 17px;">&nbsp;{{ $opnsProf->RP }}</span>
                    @endif

                </div>
              @endforeach

              @endif
<!--****************************************************************************************************************************************************-->
          @else
            <div class="decActuelle" style="text-align: center;">
              <h4 style="font-size: 25px;color: white;">RCP finie !!</h4>
              <span style="font-size: 17px; margin: auto;">Tous les profs ont donné leurs décisions.</span>
            </div>
          @endif

          @endif

      @else
        <div class="decActuelle" style="text-align: center;">
          <h4 style="font-size: 25px;color: white;">RCP finie !!</h4>
          <span style="font-size: 17px; margin: auto;">Tous les profs ont donné leurs décisions.</span>
        </div>
      @endif



    </div>

    <div><h2>RAPPORT</h2>

      @if($jours > 0)
          @if($message == 'pasEncore')
            <p>En attente que tous les profs donnent leurs décisions...</p>
          @else
            <a href="{{ route('createPDF', ['idDossier' => $dossier->id]) }}" class="btn bbt-card"><img src="/img/pdf.png"/>&nbsp;  Télécharger</a>
          @endif
      @else
      <a href="{{ route('createPDF', ['idDossier' => $dossier->id]) }}" class="btn bbt-card"><img src="/img/pdf.png"/>&nbsp;  Télécharger</a>
      @endif
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.6/prefixfree.min.js"></script>



<!--end notice--------------------------------------------------------------------------------------------------------------->




@endsection
