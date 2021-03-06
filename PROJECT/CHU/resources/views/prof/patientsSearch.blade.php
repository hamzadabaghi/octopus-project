@extends('layouts.prof')

@section('patients')
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


 <!---->
 <style>
    .retour:hover{
      border-bottom: 2px solid;
    }
  </style>

<!--pager-->
<ul class="breadcrumb" style="background-color:#c1e3e8;">

    <li class="breadcrumb-item active" style="color:rgb(224, 26, 59); font-weight:bold;"> <img src="/img/back.png"> <a href="{{ route('patients') }}" style="color: #545452;" class="retour"><strong>Retour</strong></a>
        </li>
  </ul>
<!--finpager-->

 <!--notice-->
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
          <form action="{{ route('patientsSearch') }}" method="POST" class="card card-sm">
            @csrf
            <div class="card-body row no-gutters align-items-center">
              <div class="col-auto">
                <i class="fas fa-search h4 text-body"></i>
              </div>
              <!--end of col-->
              <div class="col">
                  <input
                    class="form-control form-control-lg form-control-borderless"
                    type="text" name="ip" required
                    placeholder="Taper l'IP du Patient"
                  />

              </div>
              <!--end of col-->
              <div class="col-auto">
                <input type="submit" class="btn btn-lg btn-success" value="Rechercher">
              </div>
              <!--end of col-->
            </div>
          </form>
        </div>
        <!--end of col-->
      </div>



      <div class="table-responsive" style="margin-top: 50px;">
        <table class="table table-stripped table-bordered ">
          <thead>
            <tr style="text-align: center;">
              <th>IP</th>
              <th>NOM</th>
              <th>PRENOM</th>
              <th>CANCER</th>
              <th>DATE</th>
              <th>DOSSIER</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($dossiers as $dossier)

                      <tr style="text-align: center;">
                        <td scope="row">{{$dossier->ip}}</td>
                        <td>{{$dossier->nomP}}</td>
                        <td>{{$dossier->prenomP}}</td>
                        <td>{{$dossier->cancer}}</td>
                        <td>{{$dossier->created_at->format('d-m-Y')}}</td>
                        <td style="text-align: center;">


          <!--*********************ALGORITHME DES ETATS DES DOSSIERS**********************-->
                    @php ($cmp = 0)
                    @foreach ($opinions as $opinion)
                      @if($opinion->idDossier == $dossier->id)
                        @php ($cmp++)
                      @endif
                    @endforeach

                    @foreach($rcps as $rcp)
                      @if($rcp->idDossier == $dossier->id)
                        @if($rcp->finish)
                          @php ( $dossier->etat = 'trait??' )
                        @else
                          @if($cmp > 0)
                            @php ( $dossier->etat = 'en cours' )
                          @endif
                        @endif
                      @endif
                    @endforeach

          <!--****************************************************************************-->

                          <a href="{{ Route('rcpDossier',['idDossier'=>$dossier->id]) }}" class="btn btn-@if($dossier->etat == 'non trait??'){{__('danger')}}@elseif($dossier->etat == 'trait??'){{ __('success')}}@else{{ __('info')}}@endif">
                            <i
                              class="fas fa-file-medical-alt"
                              style="margin-right: 8px;"
                            ></i
                            >{{$dossier->etat}}</a>
                        </td>
                      </tr>

            @endforeach
          </tbody>
        </table>

      </div>




@endsection
