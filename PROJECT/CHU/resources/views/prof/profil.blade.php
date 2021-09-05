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
      <strong>Gestion du Profile</strong>
    </div>
  </div>

  @if(session('message'))
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

 <!--profile-->
 <div class="container ">
    <div class="jumbotron" style="
        margin-top: 34px;
    ">
      <div class="row">
        <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
          <div class="text-center">
            <img src="/storage/images/{{$user->image}}" class="avatar img-circle img-thumbnail"
              alt="avatar">
          </div>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
          <div class="container" style="border-bottom:1px solid black">
            <h2 style="margin-bottom: 16px;margin-left: -15px;">Prof. <span style="text-transform: uppercase;">{{ $user->name }} {{ $user->prenom }}</span></h2>
          </div>
          <hr style="margin-bottom: 3rem;border-top: 0px;">
          <ul class="container details">
            <li class="profileli" style="margin-bottom:10px;">
              <p><span><svg class="bi bi-phone" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M11 1H5a1 1 0 00-1 1v12a1 1 0 001 1h6a1 1 0 001-1V2a1 1 0 00-1-1zM5 0a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V2a2 2 0 00-2-2H5z"
                      clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M8 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                  </svg></span> {{ $user->telephone }}</p>
            </li>

            <li class="profileli" style="margin-bottom:10px;">
              <p><span><svg class="bi bi-envelope-fill" width="1em" height="1em" viewBox="0 0 16 16"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M.05 3.555L8 8.414l7.95-4.859A2 2 0 0014 2H2A2 2 0 00.05 3.555zM16 4.697l-5.875 3.59L16 11.743V4.697zm-.168 8.108L9.157 8.879 8 9.586l-1.157-.707-6.675 3.926A2 2 0 002 14h12a2 2 0 001.832-1.195zM0 11.743l5.875-3.456L0 4.697v7.046z" />
                  </svg></span> {{ $user->email }}</p>
            </li>
            <li class="profileli">
              <p><span><svg class="bi bi-person-square" width="1em" height="1em" viewBox="0 0 16 16"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                      d="M14 1H2a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V2a1 1 0 00-1-1zM2 0a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2H2z"
                      clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 100-6 3 3 0 000 6z"
                      clip-rule="evenodd" />
                  </svg></span> {{ $user->specialite }}</p>
            </li>

          </ul>

        </div>
        <div style="
              margin-top: 13px;
          " class="span1">
          <a href="{{ Route('editProfil') }}" class="btn btn-primary" style="
                margin-left: 78px;
            ">
            <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M15.502 1.94a.5.5 0 010 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 01.707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 00-.121.196l-.805 2.414a.25.25 0 00.316.316l2.414-.805a.5.5 0 00.196-.12l6.813-6.814z" />
              <path fill-rule="evenodd"
                d="M1 13.5A1.5 1.5 0 002.5 15h11a1.5 1.5 0 001.5-1.5v-6a.5.5 0 00-1 0v6a.5.5 0 01-.5.5h-11a.5.5 0 01-.5-.5v-11a.5.5 0 01.5-.5H9a.5.5 0 000-1H2.5A1.5 1.5 0 001 2.5v11z"
                clip-rule="evenodd" />
            </svg>
            <span><strong>Modifier Profile</strong></span>
          </a>
        </div>
      </div>
    </div>


    <!--end profile-->
@endsection
