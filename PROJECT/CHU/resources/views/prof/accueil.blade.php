@extends('layouts.prof')

@section('accueil')
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

<!--bonjour-->

@if (session('message'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{ __('Bonjour Professeur ') }} {{ $user->name }} {{ $user->prenom }}</strong>
  </div>
@endif


<!--notice-->
<div class="container">
    <div class="notice notice-success">
        <strong>Accueil</strong>
    </div>
</div>

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

<!--end notice -->

<!--debut icon de statistique-->
<div class="container" style="padding-bottom: 25px;margin-top:20px;">
    <div class="row">
        <div class="col-md-3">
            <div class="card-counter primary">
                <svg
                    class="bi bi-folder-fill"
                    width="1em"
                    height="1em"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M9.828 3h3.982a2 2 0 011.992 2.181l-.637 7A2 2 0 0113.174 14H2.826a2 2 0 01-1.991-1.819l-.637-7a1.99 1.99 0 01.342-1.31L.5 3a2 2 0 012-2h3.672a2 2 0 011.414.586l.828.828A2 2 0 009.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 006.172 2H2.5a1 1 0 00-1 .981l.006.139z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span class="count-numbers">{{ $nbDossiers }}</span>
                <span class="count-name">Dossiers</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter danger">
                <svg
                    class="bi bi-person-fill"
                    width="1em"
                    height="1em"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span class="count-numbers">{{ $nbProfs }}</span>
                <span class="count-name">Professeurs</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter success">
                <i class="fa fa-database"></i>
                <span class="count-numbers">{{ $nbRcps }}</span>
                <span class="count-name">RCP</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter info">
                <svg
                    class="bi bi-folder-check"
                    width="1em"
                    height="1em"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M9.828 4H2.19a1 1 0 00-.996 1.09l.637 7a1 1 0 00.995.91H9v1H2.826a2 2 0 01-1.991-1.819l-.637-7a1.99 1.99 0 01.342-1.31L.5 3a2 2 0 012-2h3.672a2 2 0 011.414.586l.828.828A2 2 0 009.828 3h3.982a2 2 0 011.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0013.81 4H9.828zm-2.95-1.707L7.587 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 011-.98h3.672a1 1 0 01.707.293z"
                        clip-rule="evenodd"
                    />
                    <path
                        fill-rule="evenodd"
                        d="M15.854 10.146a.5.5 0 010 .708l-3 3a.5.5 0 01-.708 0l-1.5-1.5a.5.5 0 01.708-.708l1.146 1.147 2.646-2.647a.5.5 0 01.708 0z"
                        clip-rule="evenodd"
                    />
                </svg>
                <span class="count-numbers">{{ $nbDosTraites }}</span>
                <span class="count-name" >Dossiers traités</span>
            </div>
        </div>
    </div>
</div>
<!--finn-->
<!--buttons administration-->

<div
    class="section-block-grey"
    style="
padding-top: 30px;"
>
    <div class="container">
        <div class="section-heading center-holder">
            <h3 style="padding-bottom: 40px;margin-top:2px;">
                Gestion des Tâches
            </h3>
        </div>
        <div class="row mt-60" style="margin-top: 20px;">
            <div class="col-md-4 col-sm-12 col-12">
                <a href="{{ route('rcp') }}">
                    <div class="serv-section-2">
                        <div class="serv-section-2-icon">
                            <i
                            style="margin-right:2px;"
                            class="fas fa-users"
                        ></i>
                                <path
                                    fill-rule="evenodd"
                                    d="M0 2a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2h-2.5a1 1 0 00-.8.4l-1.9 2.533a1 1 0 01-1.6 0L5.3 12.4a1 1 0 00-.8-.4H2a2 2 0 01-2-2V2zm5 4a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm3 1a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
                        <div class="serv-section-desc">
                            <h4>Liste</h4>
                            <h5>des RCP</h5>
                        </div>
                        <div
                            class="section-heading-line-left"
                        >
                    </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-12 col-12">
                <a href="{{ route('patients') }}">
                    <div
                        class="serv-section-2 serv-section-2-act"
                    >
                        <div
                            class="serv-section-2-icon serv-section-2-icon-act"
                        >
                        <i class="fas fa-procedures"></i>
                        <path
                            fill-rule="evenodd"
                            d="M9.828 4H2.19a1 1 0 00-.996 1.09l.637 7a1 1 0 00.995.91H9v1H2.826a2 2 0 01-1.991-1.819l-.637-7a1.99 1.99 0 01.342-1.31L.5 3a2 2 0 012-2h3.672a2 2 0 011.414.586l.828.828A2 2 0 009.828 3h3.982a2 2 0 011.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0013.81 4H9.828zm-2.95-1.707L7.587 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 011-.98h3.672a1 1 0 01.707.293z"
                            clip-rule="evenodd"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M15.854 10.146a.5.5 0 010 .708l-3 3a.5.5 0 01-.708 0l-1.5-1.5a.5.5 0 01.708-.708l1.146 1.147 2.646-2.647a.5.5 0 01.708 0z"
                            clip-rule="evenodd"
                        />
                         </svg>
                        </div>
                        <div class="serv-section-desc">
                            <h4>Liste</h4>
                            <h5>des Patients</h5>
                        </div>
                        <div
                            class="section-heading-line-left"
                        ></div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-12 col-12">
                <a href="{{ route('report') }}">
                    <div class="serv-section-2">
                        <div class="serv-section-2-icon">
                            <svg
                            class="bi bi-cone-striped"
                            style="margin-right:3px;"
                            width="1em"
                            height="1em"
                            viewBox="0 0 16 16"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.879 11.015a.5.5 0 01.242 0l6 1.5a.5.5 0 01.037.96l-6 2a.499.499 0 01-.316 0l-6-2a.5.5 0 01.037-.96l6-1.5z"
                                clip-rule="evenodd"
                            />
                            <path
                                d="M11.885 12.538l-.72-2.877C10.303 9.873 9.201 10 8 10s-2.303-.127-3.165-.339l-.72 2.877c-.073.292-.002.6.256.756C4.86 13.589 5.916 14 8 14s3.14-.411 3.63-.706c.257-.155.328-.464.255-.756zM9.97 4.88l.953 3.811C10.159 8.878 9.14 9 8 9c-1.14 0-2.159-.122-2.923-.309L6.03 4.88C6.635 4.957 7.3 5 8 5s1.365-.043 1.97-.12zm-.245-.978L8.97.88C8.718-.13 7.282-.13 7.03.88L6.275 3.9C6.8 3.965 7.382 4 8 4c.618 0 1.2-.036 1.725-.098z"
                            />
                        </svg>
                        </div>
                        <div class="serv-section-desc">
                            <h4>Reclamation</h4>
                            <h5>des Bugs</h5>
                        </div>
                        <div
                            class="section-heading-line-left"
                        ></div>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>
<!--fin-->



@endsection
