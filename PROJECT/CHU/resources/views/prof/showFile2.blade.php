@extends('layouts.prof')

@section('content')

<!--notice-->
<div class="container">
    <div class="notice notice-success">
        <strong>Dossier : Dabaghi Hamza</strong>
    </div>
</div>

<!--end notice-->

<div class="row justify-content-lg-center">
    <div class="col-lg-10 ">

        <!--button de gestion-->
        <p style="text-align
        : center;
        margin-top:30px;margin-bottom: 30px;">
            <a class="btn icon-btn btn-info" data-toggle="modal" data-target="#myModal" type="button" style="color:white;" >
              <svg class="bi bi-person-plus-fill" width="1em" height="1em"
                    viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm7.5-3a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13V5.5a.5.5 0 01.5-.5z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M13 7.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z"
                        clip-rule="evenodd" />
                </svg>
                Modifier</a>
            <a class="btn icon-btn btn-warning" href="#"><svg class="bi bi-download" width="1em" height="1em"
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
                Imprimer</a>
            <a class="btn icon-btn btn-secondary" href="#">
                Retour</a>

        </p>

        <!--fin des buttons en dessus de table-->
        <!--model1-->
        <!-- Trigger the modal with a button -->

    </div>
</div>

<!-- Tabs -->

<div class="container " style="margin-top:15px;">

<button class="tablink" onclick="openPage('Home', this, '#d07575')"id="defaultOpen">Patient</button>
<button class="tablink" onclick="openPage('News', this, '#d07575')" >Dossier</button>
<button class="tablink" onclick="openPage('Contact', this, '#d07575')">Decision</button>
<button class="tablink" onclick="openPage('About', this, '#d07575')">Avis</button>

<div id="Home" class="tabcontent " >
    <div class="items">
        <div class="item ">NOM : DABAGHI</div>
        <div class="item">PRENOM : HAMZA</div>
        <div class="item">DATE DE NAISSANCE  1998-06-28</div>
        <div class="item">SEXE : HOMME</div>
        <div class="item">ADRESSE : Fes MAROC </div>
        <div></div>




      </div>
</div>

<div id="News" class="tabcontent">
    <div class="items">
        <div class="item ">Type de cancer : Cavite Orale</div>
        <div class="item">Type Histologique : Mela..</div>
        <div class="item">Facteurs Mauvais Protonostic :hamza</div>
        <div class="item">
            <div>
                cTNM :
            </div>
            <div>
                pTNM :
            </div>
        </div>
        <div class="item">ADRESSE : Fes MAROC </div>

      </div>
</div>

<div id="Contact" class="tabcontent">
  <h3>Decision</h3>
  <p>contenu</p>
</div>

<div id="About" class="tabcontent">
  <h3>avis</h3>
  <p>contenu</p>
</div>

</div>
<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>


<!-- ./Tabs -->
@endsection
