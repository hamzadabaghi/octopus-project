<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
    <title>RCP</title>
</head>
<body>

    <style type="text/css" media="all">
          body{
            font-family: Arial, Helvetica, sans-serif;
          }
          .entete{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
          }
          h2{
            color: #0078ad;
          }
    </style>

    <div class="entete">
      <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/img/CHU.png';?>" style="width: 160px; margin-right: 300px;"/>
      <h1 style="color: #0078ad;font-size: 30px; text-align:center;">
        ORL <br>
        <span style="color: black; font-size: 22px;">{{ $dossier->cancer }}</span>
      </h1>
    </div>

    <h1 style="text-align: center;">Rapport de la RCP</h1>



    <h2>RESIDENT:</h2>
      <ul>
        <li><strong>Nom du Résident : </strong>{{  $dossier->nomR }}</li>
        <li><strong>Prenom du Résident : </strong>{{ $dossier->prenomR }}</li>
        <li><strong>Cin du Résident : </strong>{{ $dossier->cin }}</li>
      </ul>


    <h2>PATIENT:</h2>
      <ul>
        <li><strong>IP du Patient : </strong>{{ $dossier->ip }}</li>
        <li><strong>Nom du Patient : </strong>{{ $dossier->nomP }}</li>
        <li><strong>Prenom du Patient : </strong>{{ $dossier->prenomP }}</li>
        <li><strong>Date de Naissance du Patient : </strong>{{ $dossier->dateN }}</li>
      </ul>

      <h2>CANCER:</h2>
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
<!--****************************************cTNM et pTNM*************************************-->
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
        @else
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
<!--******************************************************************************************************-->
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
      <strong class="text-danger">{{ __('La Chirurgie est possible !!') }}</strong>
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
  <strong class="text-danger">{{ __('La Chimiothérapie est possible !!') }}</strong>
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
  <strong class="text-danger">{{ __('La Radiothérapie est possible !!') }}</strong>
@else
  <strong>Contre Indication à la Radiothérapie : </strong>
  <ul>
    <li>{{ $dossier->CIRadiotherapie }}</li>
  </ul>
@endif
@endif
</li>
      @if($dossier->resultat_premier_traitement != null)
        <li>
            <strong>Resultat de premier Traitement : </strong>
            <ul>
                @if(in_array("RELIQUAT_N", $dossier->resultat_premier_traitement))<li>Reliquat sur N</li>@endif
                @if(in_array("RELIQUAT_T", $dossier->resultat_premier_traitement))<li>Reliquat sur T</li>@endif
            </ul>

        </li>
      @endif

      @if( $dossier->chimiotherapie_premiere !=null )
        <li>
            <strong>Chimiotherapie premiere :</strong>
            <ul>
                <li>Reponse incomplète ou progression</li>
            </ul>
        </li>
      @endif

      @if( $dossier->Rechute !=null )
        <li>
            <strong>Rechute : </strong>
            <ul>
                @if(in_array("RECHUTE_N", $dossier->Rechute))<li>Rechute sur N</li>@endif
                @if(in_array("RECHUTE_T", $dossier->Rechute))<li>Rechute sur T</li>@endif
            </ul>
        </li>
      @endif



      <h2>Les avis des Professeurs:</h2>

      @foreach ($users as $user)
          <ul>
            <li>

              @foreach ($opinions as $opinion)
                  @if($opinion->idProf == $user->id)
                  <strong>Pr. {{ $user->name }} {{ $user->prenom }} : </strong>
                    @if($opinion->opnApp != null)
                      @if(is_array($opinion->opnApp))
                        <ul>
                          @foreach ($opinion->opnApp as $item)
                                <li>{{ $item }}</li>
                          @endforeach
                        </ul>
                        @else
                        {{ $opinion->opnApp }}
                      @endif
                    @elseif($opinion->opnProf != null)
                      {{ $opinion->opnProf }}
                    @elseif($opinion->RP != 'null')
                      {{ $opinion->RP }}
                    @else
                      @if(is_array($opinion->opnAutresProfs))
                        @foreach($opinion->opnAutresProfs as $item)
                          {{ $item }}
                          @foreach ($opinions as $opn)
                              @if($opn->opnProf == $item)
                                @if($opn->idProf != $user->id)
                                  @foreach($users as $usr)
                                    @if($usr->id == $opn->idProf)
                                     <span style="color: #0078ad">(Pr. {{ $usr->name }} {{ $usr->prenom }})</span>
                                    @endif
                                  @endforeach
                                @endif
                              @endif
                          @endforeach
                        @endforeach
                      @else
                        {{ $opinion->opnAutresProfs }}
                        @foreach ($opinions as $opn)
                            @if($opn->opnProf == $opinion->opnAutresProfs)
                              @if($opn->idProf != $user->id)
                                @foreach($users as $usr)
                                  @if($usr->id == $opn->idProf)
                                    <span style="color: #0078ad">(Pr. {{ $usr->name }} {{ $usr->prenom }})</span>
                                  @endif
                                @endforeach
                              @endif
                            @endif
                        @endforeach
                      @endif
                    @endif

                    @break
                  @endif
              @endforeach
            </li>
          </ul>
      @endforeach


      <div style="text-align: center; border: solid 2px #27a13f; border-radius: 10px; padding-bottom: 20px; margin-top: 30px;">
        <h2 style="color: #27a13f;">Décision finale:</h2>

          @php ($drp = 0)

          @foreach($opinions as $opinion)
            @if($opinion->RP != 'null')
              <strong>" {{ $opinion->RP }} "</strong>
              @php ($drp = 1)
              @break
            @endif
          @endforeach



          @if($drp == 0)

            @php ($drp2 = 0)

            @foreach($opinions as $opinion)
              @if($opinion->opnProf != null)
                <strong>" {{ $opinion->opnProf }} "</strong>
                @php ($drp2 = 1)
                @break
              @endif
            @endforeach


            @if($drp2 == 0)
              @foreach($opinions as $opinion)
                @if(is_array($opinion->opnApp))
                  @foreach ($opinion->opnApp as $item)
                    <strong>" {{ $item }} "</strong><br>
                  @endforeach
                @else
                  <strong>{{ $opinion->opnApp }}</strong>
                @endif
                @break
              @endforeach
            @endif
          @endif

      </div>




</body>
</html>
