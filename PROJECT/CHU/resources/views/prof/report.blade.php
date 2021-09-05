@extends('layouts.prof')

@section('report')
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
      <strong>Reclamation</strong>
    </div>
  </div>

<!--end notice-->

@if (session('feedback'))
  <div class="flag note note--success">
    <div class="flag__image note__icon">
      <i class="fa fa-check"></i>
    </div>
    <div class="flag__body note__text">
      {{ session('feedback') }}
    </div>
    <a href="#" class="note__close">
      <i class="fa fa-times"></i>
    </a>
</div>
@endif


        <!--Report  -->
        <div class="container card bg-light d-flex justify-content-center" style="margin-top:60px;">
          <div class="row justify-content-lg-center">
            <div class="col-md-10 ">
              <div class="well well-sm">
                <form class="form-horizontal" action="{{ route('sendReportProf') }}"  method="POST">
                    @csrf
                  <fieldset>
                    <h3 style="margin-left:15px;margin-top:35px;">Envoyez-nous un email</h3>
                    <!-- sujet input-->
                    <div class="form-group" style="margin-top:20px;">
                        <label class="col-md-3 control-label" for="name"
                          >Sujet</label
                        >
                        <div class="col-md-9">
                          <input
                            id="name"
                            name="sujet"
                            type="text"
                            placeholder="sujet"
                            class="form-control @error ('sujet') is-danger @enderror"
                            value="{{ old("sujet") }}"
                          />
                        </div>
                        @error('sujet')

                                            <p class="help is-danger" style="color:red;margin-left:15px;">{{ $errors->first('sujet') }}</p>
                                            @enderror
                      </div>

                      <!-- Message body -->
                      <div class="form-group" style="margin-top:20px;">
                        <label class="col-md-3 control-label" for="message"
                          >Your message</label
                        >
                        <div class="col-md-9">
                          <textarea
                            class="form-control @error ('message') is-danger @enderror"
                            id="message"
                            name="message"
                            placeholder="Tapez votre message ici ..."
                            rows="5"
                          >{{ old('message') }}</textarea>
                          @error('message')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('message') }}</p>
                                            @enderror
                        </div>
                      </div>

                      <!-- Form actions -->
                    <div class="form-group">
                      <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary">
                          Envoyer
                        </button>
                        <a href="{{ route('accueil') }}"><button type="button" class="btn btn-success">
                          Annuler
                        </button></a>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
          <!--end report-->

@endsection
