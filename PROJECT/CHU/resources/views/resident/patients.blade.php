
@extends('layouts.resident')

@section('patients')
class="active"
@endsection

@section('content')


<!--notice d'erreur des infos de medecin -->
@if (session('fedbackdelete'))
  <div class="flag note note--success">
    <div class="flag__image note__icon">
      <i class="fa fa-check"></i>
    </div>
    <div class="flag__body note__text">
      {{ session('fedbackdelete') }}
    </div>
    <a href="#" class="note__close">
      <i class="fa fa-times"></i>
    </a>
</div>
@endif
<!---->
 <!--notice-->
 @if(request()->input('q'))
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
 @endif

 <div class="container">
    <div class="notice notice-success ">
      <strong>Gestion des Dossiers</strong>
    </div>
  </div>
  <!--table-->

  <div class="row justify-content-lg-center">
    <div class="col-lg-10 ">
      <!--search-->
      <div style="margin-bottom: 8px;" class="row justify-content-center">
        <div
          class="col-12 col-md-10 col-lg-8"
          style="
        margin-top: 51px;"
        >


        <!--search by IP-->
          <form class="card card-sm" method="GET" action="{{ route('searchIP') }}">

            <div class="card-body row no-gutters align-items-center">
              <div class="col-auto">
                <i class="fas fa-search h4 text-body"></i>
              </div>
              <!--end of col-->
              <div class="col">
                <input
                  class="form-control form-control-lg form-control-borderless"
                  type="search"
                  placeholder="Taper le IP du Patient" name="q" required value="{{ request()->q ?? '' }}"
                />
              </div>
              <!--end of col-->
              <div class="col-auto">
                <button class="btn btn-lg btn-success" type="submit">
                  Rechercher
                </button>
              </div>
              <!--end of col-->
            </div>
          </form>
          <!--end search-->


        </div>
        <!--end of col-->
      </div>
      <!--fin-->

      <!--button de gestion-->
      <p
        style="text-align
      : center;
      margin-top:30px;margin-bottom: 30px;"
      >
        <a
          class="btn  btn-outline-primary"
          href="{{ route('chooseCancer') }}"
          style="border-radius: 20px;"
        >
          <i style="margin-right:1px;" class="fas fa-user-plus"></i>
          Ajouter
        </a>
      </p>

      <!--resultats de la recherche -->
      @if(request()->input('q'))
      @if($Dossiers->total() == 0)
        <div class="flag note note--error">
            <div class="flag__image note__icon">
            <i class="fa fa-times"></i>
            </div>
            <div class="flag__body note__text">
              {{ $Dossiers->total() }} résultat(s) pour la recherche "{{ request()->q }}"
            </div>
            <a href="#" class="note__close">
            <i class="fa fa-times"></i>
            </a>
        </div>
      @else
        <div class="flag note note--success">
            <div class="flag__image note__icon">
              <i class="fa fa-check"></i>
            </div>
            <div class="flag__body note__text">
              {{ $Dossiers->total() }} résultat(s) pour la recherche "{{ request()->q }}"
            </div>
            <a href="#" class="note__close">
              <i class="fa fa-times"></i>
            </a>
        </div>
      @endif
      @endif
      <!--fin des buttons en dessus de table-->
      <div class="table-responsive" style="margin-top: 50px;">
        <table class="table table-stripped table-bordered ">
          <thead>
            <tr style="text-align: center;">
              <th>IP</th>
              <th>NOM</th>
              <th>PRENOM</th>
              <th>CANCER</th>
              <th>DATE</th>
              <th><img src="/img/medicalFile.png" width="26">DOSSIER</th>
            </tr>
          </thead>
          <tbody>

              @foreach ($Dossiers as $dossier )


            <tr style="text-align: center;">
              <td scope="row">{{ $dossier->ip }}</td>
              <td>{{ $dossier->nomP }}</td>
              <td>{{ $dossier->prenomP }}</td>
              <td>{{ $dossier->cancer }}</td>
              <td>{{ $dossier->created_at->format('d-m-Y') }}</td>
              <td>
                <a href="{{ route('showFile',[$dossier]) }}" class="btn btn-primary "><i
                    class="fas fa-file-medical-alt"
                    style="margin-right: 8px;"
                  ></i
                  >Dossier</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $Dossiers->links() !!}
        </div>
      </div>


@endsection
