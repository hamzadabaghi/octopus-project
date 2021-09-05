@extends('layouts.resident')

@section('patients')
class="active"
@endsection


@section('content')

<!--notice-->
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
      <strong>Ajout d'un Dossier</strong>
    </div>
</div>


<!--end Notice-->



<!--contenu-->

<!--nav departement-->
<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">

            <button
              class="btn btn-dark d-inline-block d-lg-none ml-auto"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
              style="background-color: #2e7ad1; border: none;"
            >
              <i class="fas fa-align-justify"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">ORL</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Neurochirurgie</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Chirurgie</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Traumatologie</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Urologie</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Gynécologie</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Dermatologie</a>
                </li>
              </ul>
            </div>
      </div>
    </nav>

    <form methode="POST" action="{{  route('chooseCancer') }}" >


       <select name="cancer" class="custom-select" tabindex="-1" id="select-name">

                 <optgroup label="Pharynx">
                 <option value="Nasopharynx" @yield('canceractive1')  >Nasopharynx</option>
                 <option value="Hypopharynx" @yield('canceractive2')  >Hypopharynx</option>
                 <option value="Oropharynx" @yield('canceractive3')  >Oropharynx</option>
                 </optgroup>
                 <option value="Cavite Orale" @yield('canceractive4')  >Cavite Orale</option>
                 <option value="Larynx" @yield('canceractive5')  >Larynx</option>

       </select>
       <button type="submit" style="margin-top:20px;margin-bottom:15px;margin-left:16px;"class="btn btn-primary ">Aller</button>
    </form>

<!--cancer-->


@yield('cancer')


<!--endcancer-->

</div>
<!--endContenu-->


@endsection



