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


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="align-content:left;">Modification</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

        <!--fin de model1-->

    </div>
</div>

<!--info-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div id="accordion" class="checkout">




                <!--first-->

                <div class="panel checkout-step">

                    <div>

                        <span class="checkout-step-number">1</span>
                        <h4 class="checkout-step-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                href="#collapseOne">Informations du Patient
                            </a>
                        </h4>

                    </div>
                    <div id="collapseOne" class="collapse in">
                        <div class="checkout-step-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="checkout-login">

                                        <div class="infopersonnel" style="align-content:space-around;margin-bottom:20px;">
                                            <h5 style="color:#000;margin-bottom:10px;">Nom : <span class="infopersonnel" style="color:#cc0f0f;">Dabaghi</span></h5>


                                            <h5 style="color:#000;margin-bottom:10px;">Prenom : <span class="infopersonnel" style="color:#cc0f0f;">Hamza</span></h5>


                                            <h5 style="color:#000;margin-bottom:10px;">Date de Naissance : <span  class="infopersonnel" style="color:#cc0f0f;">28-06-1998</span></h5>
                                            <h5 style="color:#000;margin-bottom:10px;">Adresse : <span class="infopersonnel" style="color:#cc0f0f;">Fès Maroc</span></h5>

                                            <h5 style="color:#000;margin-bottom:10px;">Sexe : </h5>
                                            <input  type="radio" name="gender"
                                                    value="option1" checked />
                                                <span style="color:#cc0f0f;"> Masculin </span>


                                                <input type="radio" name="gender"
                                                    value="option2" />
                                                <span class="form-check-label"> Feminin </span>



                                        </div>
                                        <!-- Button -->
                                        <div>
                                            <div class="col-md-12">
                                                <a class="collapsed btn btn-primary " role="button"
                                                    data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseTwo">Next</a>
                                            </div>
                                        </div>


                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <!--two-->

                <div class="panel checkout-step">

                    <div role="tab" id="headingTwo"> <span class="checkout-step-number">2</span>

                        <h4 class="checkout-step-title"> <a class="collapsed" role="button" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseTwo">Informations du Dossier</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="checkout-step-body">
                            <div class="checout-address-step">
                                <div class="row">
                                    <div class="col-lg-8">

                                        <!-- Localisation -->


                                        <div>
                                            <h5 style="color:#000;margin-bottom:10px;" class="col-md-12 " for="address">Cancer
                                                : Cavite Orale</h5>
                                            <h5 style="color:#000;margin-bottom:10px;" class="col-md-12 " for="address">Localisation
                                                : Langue Mobile</h5>
                                            <h5 style="color:#000;margin-bottom:10px;" class="col-md-12 " for="name">Type Histologique :
                                                Carcinome
                                                neuro-endocrine</h5>
                                            <h5 style="color:#000;margin-bottom:10px;" class="col-md-12 " for="time">Facteurs Mauvais Pronostic
                                                :</h5>
                                            <h5 style="color:#000;margin-bottom:10px;" class="col-md-12 ">1 - Emboles Neoplasiques</h5>
                                            <h5 style="color:#000;margin-bottom:10px;" class="col-md-12 ">2 - Engainement Perinerveux</h5>


                                        </div>

                                        <!-- Type histologique-->




                                        <div>
                                            <div class="col-md-12">
                                                <a class="collapsed btn btn-primary " role="button"
                                                    data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseThree">Next</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--three-->

                <div class="panel checkout-step">
                    <div role="tab" id="headingThree"> <span class="checkout-step-number">3</span>
                        <h4 class="checkout-step-title"> <a class="collapsed" role="button" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseThree">Decision de l'Application</a> </h4>
                    </div>

                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="checkout-step-body">
                            <div class="row">
                                <div class="col-lg-8">


                                    <div>
                                        <!--contenu-->
                                        <!---->
                                    </div>

                                    <div>
                                        <div class="col-md-12">
                                            <a class="collapsed btn btn-primary" role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapseFour"> Next </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--four-->

                <div class="panel checkout-step">
                    <div role="tab" id="headingFour"> <span class="checkout-step-number">4</span>
                        <h4 class="checkout-step-title"> <a class="collapsed" role="button" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseFour">Avis des Professeurs</a> </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="checkout-step-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div>

                                    </div>
                                    <div>
                                        <div class="col-md-12">
                                            <a class="collapsed btn btn-primary " role="button" data-toggle="collapse"
                                                data-parent="#accordion" href="#collapseFive">Next</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--five-->

                <div class="panel checkout-step">
                    <div role="tab" id="headingFive"> <span class="checkout-step-number">5</span>
                        <h4 class="checkout-step-title"> <a class="collapsed" role="button" data-toggle="collapse"
                                data-parent="#accordion" href="#collapseFive">Reservé</a> </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse">
                        <div class="checkout-step-body">
                            <div class="row">
                                <div class="col-lg-8">




                                </div>

                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
</div>

@endsection
