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
  <div class="container">
      <div class="notice notice-success">
        <strong>Gestion des RCP</strong>
      </div>
      @php ($cmp1 = 0)
      @foreach ($rcps as $rcp)

        @if(!$rcp->finish)
        <div class="card p-3 rcpCard ">
          @php ($cmp1++)
          @php ($drp = 0)
          @foreach($opnsProf as $opn)
            @if($opn->idDossier == $rcp->idDossier)
              @php ($drp = 1)
            @endif
          @endforeach


<!--*****************************************************TEST DES NOUVELLES RCP***********************************************************-->

          @if($drp == 0)

              @php ($jours = 15 - now()->diff($rcp->created_at)->d)

              @if($jours > 0)
                <span
                    style="width: 90px; margin: auto;"
                    class="badge badge-pill badge-danger"
                    >Nouvelle RCP
                </span>
                <div class="text-danger text-center h5" style="position: absolute; top: 12px; right: 20px; font-family: pop;">
                  Il vous reste {{ $jours }} jours !!
                </div>
              @else
                <div class="text-danger text-center h5" style="position: absolute; top: 12px; right: 20px; font-family: pop;">
                  Temps expiré !!
                </div>
              @endif

          @else
            <span
                style="width: 140px; margin: auto;"
                class="badge badge-pill badge-info"
                >En Cours de traitement...
            </span>
          @endif

<!--****************************************************************************************************************************************-->

          <h1><span style="color: red;">IP:</span>
            @foreach ($dossiers as $dossier)
                @if($dossier->id == $rcp->idDossier)
                  {{$dossier->ip}}
                  @break
                @endif
            @endforeach
            <span style="font-size: 18px; ">&nbsp;&nbsp;&nbsp;(Crée en {{$rcp->created_at}})</span>
          </h1>
          <ul style="margin-top: 20px;">
            <li><h5>Résident: <span style="font-weight: bold;">@foreach ($dossiers as $dossier)
                                                                  @if($dossier->id == $rcp->idDossier)
                                                                    {{$dossier->nomR}} {{$dossier->prenomR}}
                                                                    @break
                                                                  @endif
                                                              @endforeach</span></h5>
            </li>
            <li><h5>Patient: <span style="font-weight: bold;">@foreach ($dossiers as $dossier)
                                                                  @if($dossier->id == $rcp->idDossier)
                                                                    {{$dossier->nomP}} {{$dossier->prenomP}}
                                                                    @break
                                                                  @endif
                                                              @endforeach</span></h5>
            </li>
          </ul>
          <small style="font-size: 16px;display: flex; justify-content: center; align-item: center; width: 300px;">
            Pour plus d'informations
            <a href="{{ Route('rcpDossier',['idDossier'=>$dossier->id]) }}" class=" bbt-card bbt-card1" >Cliquez ici</a>
          </small>
        </div>
        @endif
      @endforeach

      @if($cmp1 == 0)
        <div class="flag note note--info">
          <div class="flag__image note__icon">
            <i class="fa fa-info"></i>
          </div>
          <div class="flag__body note__text">
            {{ __('Aucune RCP ne se trouve à l\'instant !!') }}
          </div>
          <a href="#" class="note__close">
            <i class="fa fa-times"></i>
          </a>
        </div>
      @endif

      <div class="row">
        <div class="pt-5 d-flex justify-content-center col-12">
          {{$rcps->links()}}
        </div>
      </div>



  </div>





<!--end notice-->
@endsection
