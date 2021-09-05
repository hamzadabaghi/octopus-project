@extends('resident.addFile')

@section('canceractive3')
selected
@endsection

@section('cancer')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div id="accordion" class="checkout">
                <form action="{{ route('oropharynx') }}" method="POST">
                    @csrf


                     <!--zero-->

                     <div class="panel checkout-step">
                        <h3 style="text-align: center; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid;">Oropharynx</h3>
                        <div>

                            <span class="checkout-step-number">0</span>
                            <h4 class="checkout-step-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseZero">Informations du resident
                                </a>
                            </h4>

                        </div>
                        <div id="collapseZero" class="panel-collapse in">
                            <div class="checkout-step-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="checkout-login col-md-12">

                                            <div class="form-group">
                                                <label for="nomR">Nom :</label>
                                                <input type="text" class="form-control @error ('nomR') is-danger @enderror" id="nomR"
                                                    placeholder="Entrer le nom" name="nomR" value="{{ old('nomR') }}" />
                                            </div>
                                            @error('nomR')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('nomR') }}</p>
                                            @enderror
                                            <div class="form-group">
                                                <label for="prenomR">Prenom :</label>
                                                <input type="text" class="form-control @error ('prenomR') is-danger @enderror" id="prenomR"
                                                    placeholder="Entrer le prenom" name="prenomR" value="{{ old('prenomR') }}"/>
                                            </div>
                                            @error('prenomR')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('prenomR') }}</p>
                                            @enderror

                                            <div class="form-group">
                                                <label for="cin"> Cin :</label>
                                                <input type="text" class="form-control @error ('cin') is-danger @enderror" id="cin"
                                                    placeholder="Entrer le Cin" name="cin" value="{{ old('cin') }}"/>
                                            </div>
                                            @error('cin')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('cin') }}</p>
                                            @enderror



                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
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
                        <div id="collapseOne" class="panel-collapse in">
                            <div class="checkout-step-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="checkout-login col-md-12">

                                            <div class="form-group">
                                                <label for="IP">IP :</label>
                                                <input type="text" class="form-control @error ('IP') is-danger @enderror" id="IP"
                                                    placeholder="Entrer le IP du Patient" name="IP" value="{{ old('IP') }}"/>
                                            </div>
                                            @error('IP')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('IP') }}</p>
                                            @enderror

                                            <div class="form-group">
                                                <label for="nomP">Nom :</label>
                                                <input type="text" class="form-control @error ('nomP') is-danger @enderror" id="nomP"
                                                    placeholder="Entrer le nom" name="nomP" value="{{ old('nomP') }}"/>
                                            </div>
                                            @error('nomP')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('nomP') }}</p>
                                            @enderror
                                            <div class="form-group">
                                                <label for="prenomP">Prenom :</label>
                                                <input type="text" class="form-control @error ('prenomP') is-danger @enderror" id="prenomP"
                                                    placeholder="Entrer le prenom" name="prenomP" value="{{ old('prenomP') }}"/>
                                            </div>
                                            @error('prenomP')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('prenomP') }}</p>
                                            @enderror
                                            <div class="form-group">
                                                <label for="dateNaissance">Date de Naissance :</label>
                                                <input type="date" class="form-control @error ('dateNaissance') is-danger @enderror" id="dateNaissance"
                                                    placeholder="Entrer la dateNaissance" name="dateNaissance" value="{{ old('dateNaissance') }}"/>
                                            </div>
                                            @error('dateNaissance')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('dateNaissance') }}</p>
                                            @enderror
                                            <div class="form-group">
                                                <label>Sexe :</label><br />
                                                <label class="form-check form-check-inline @error ('sexe') is-danger @enderror">
                                                    <input class="form-check-input" type="radio" name="sexe"
                                                        value="Masculin" />
                                                    <span class="form-check-label"> Masculin </span>
                                                </label>
                                                <label class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sexe"
                                                        value="Feminin" />
                                                    <span class="form-check-label"> Feminin </span>
                                                </label>
                                            </div>
                                            @error('sexe')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('sexe') }}</p>
                                            @enderror

                                            <!-- Button -->
                                            <div class="form-group">

                                                <a class="collapsed btn btn-primary " role="button"
                                                    data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseTwo">Suivant</a>

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
                                    data-parent="#accordion" href="#collapseTwo">Localisation & Type Histologique</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="checkout-step-body">
                                <div class="checout-address-step">
                                    <div class="row">
                                        <div class="col-lg-8">



                                            <!-- Type histologique-->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label" for="name">Type Histologique :</label>
                                                    <select name="TH" class="custom-select" tabindex="-1"
                                                        id="select-name">
                                                        @php
                                                             $i = 0;
                                                             $j= 0;
                                                             $var2 = 0;
                                                         @endphp
                                                        @foreach ($TypeHisto as $TypeHisto)
                                                         @if($TypeHisto->groupeTypeHisto != null)
                                                         @php
                                                         nouveau :
                                                         $var1=$TypeHisto->groupeTypeHisto;
                                                         if($i==0)
                                                         {
                                                            $var2=$var1;
                                                            $i=1;
                                                         }
                                                         @endphp
                                                          @if($var1==$var2)
                                                             @if($j==0)
                                                                <optgroup label="{{ $TypeHisto->groupeTypeHisto }}">
                                                                 @php
                                                                     $j=1;
                                                                 @endphp
                                                             @endif
                                                            <option value="{{ $TypeHisto->titreTypeHisto }}">{{ $TypeHisto->titreTypeHisto }}</option>
                                                                @php
                                                                     $var2=$TypeHisto->groupeTypeHisto;
                                                                @endphp
                                                          @else
                                                             </optgroup>
                                                             @php
                                                                     $j=0;
                                                                     $i=0;
                                                                     goto nouveau;
                                                             @endphp
                                                          @endif
                                                         @endif
                                                         @if($TypeHisto->groupeTypeHisto == null)
                                                            </optgroup>
                                                         <option value="{{ $TypeHisto->titreTypeHisto }}">{{ $TypeHisto->titreTypeHisto }}</option>
                                                         @endif
                                                         @endforeach
                                                    </select>


                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <a class="collapsed btn btn-primary " role="button"
                                                        data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapseThree">Suivant</a>
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
                                    data-parent="#accordion" href="#collapseThree">Facteurs Mauvais Pronostic</a> </h4>
                        </div>

                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="checkout-step-body">
                                <div class="row">
                                    <div class="col-lg-8">


                                        <div class="form-group">
                                            <label class="col-md-12 control-label" for="time">Facteurs Mauvais Pronostic
                                                :</label>
                                            <div class="col-md-12">

                                                @foreach ($FMP as $FMP)
                                                <label class="container chekingfacteur">{{ $FMP->titreFMP }}
                                                    <input type="checkbox" name="FMP[]" value="{{ $FMP->titreFMP }}">
                                                    <span class="checkmark"></span>
                                                </label>
                                                @endforeach

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <a class="collapsed btn btn-primary" role="button"
                                                    data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseFour"> Suivant </a>
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
                                    data-parent="#accordion" href="#collapseFour">cTNM & pTNM</a> </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="checkout-step-body">
                                <div class="row">
                                    <div class="col-lg-8">

                                        <!-- cTNM et p TNM -->


                                        <h5>p16</h5>
                                        <!--le p16 positive ou negatif -->
                                        <div class="form-group" style="margin-bottom:30px;">
                                            <select name="p16" class="custom-select" tabindex="-1"
                                                id="select-name">
                                                <option value="positif" selected>p16 positif (HPV)</option>
                                                <option value="negatif">p16 negatif (non HPV)</option>
                                            </select>
                                        </div>

                                        <!--fin de p16-->
                                        <h5  style="margin-bottom:20px;">cTNM</h5>
                                        <h6>cT</h6>
                                        <div class="form-group"  style="margin-bottom:30px;">
                                            <select name="cT" class="custom-select" tabindex="-1"
                                                id="select-name">
                                                @php
                                                $tab1=$tab2=$cTNM

                                                @endphp
                                                @foreach ($cTNM as $cTNM)
                                                @if($cTNM->groupeCTNM =='cT' && $cTNM->p16 !=null)
                                                <option value="{{ $cTNM->titrecTNM }}" >{{ $cTNM->titrecTNM }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <h6>cN</h6>
                                        <div class="form-group"  style="margin-bottom:30px;">
                                            <select name="cN" class="custom-select" tabindex="-1"
                                                id="select-name">
                                                @foreach ($tab1 as $tab)
                                                @if($tab->groupeCTNM =='cN' && $tab->p16 !=null)
                                                <option value="{{ $tab->titrecTNM }}" >{{ $tab->titrecTNM }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <h6>M</h6>
                                        <div class="form-group"  style="margin-bottom:30px;">
                                            <select name="M" class="custom-select" tabindex="-1"
                                                id="select-name">
                                                @foreach ($tab2 as $tab)
                                                @if($tab->groupeCTNM =='M' && $tab->p16 !=null)
                                                <option value="{{ $tab->titrecTNM }}" >{{ $tab->titrecTNM }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>


                                        <!--ptnm-->
                                        <h5  style="margin-bottom:20px;">pTNM</h5>

                                        <h6>pT</h6>
                                        <div class="form-group"  style="margin-bottom:30px;">
                                            <select name="pT" class="custom-select" tabindex="-1"
                                                id="select-name">
                                                @php $tab3=$pTNM @endphp
                                                @foreach ($pTNM as $pTNM)
                                                @if($pTNM->groupepTNM =='pT' && $pTNM->p16 !=null)
                                                <option value="{{ $pTNM->titrepTNM }}" >{{ $pTNM->titrepTNM }}</option>
                                                @endif
                                                @endforeach

                                            </select>
                                        </div>
                                        <h6>pN</h6>
                                        <div class="form-group"  style="margin-bottom:30px;">
                                            <select name="pN" class="custom-select" tabindex="-1"
                                                id="select-name">
                                                @foreach ($tab3 as $tab)
                                                @if($tab->groupepTNM =='pN' && $tab->p16 !=null)
                                                <option value="{{ $tab->titrepTNM }}" >{{ $tab->titrepTNM }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <a class="collapsed btn btn-primary " role="button"
                                                    data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseFive">Suivant</a>
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
                                    data-parent="#accordion" href="#collapseFive">Contre
                                    Indication à une Operation Medicale</a> </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="checkout-step-body">
                                <div class="row">
                                    <div class="col-lg-8">


                                        <h5>Contre Indication à la chirurgie:</h5>
                                        <div class="form-group">
                                            @php $tab1=$tab2=$cIndication @endphp
                                            @foreach ( $cIndication as  $cIndication )
                                            @if($cIndication->OperationMedicale =='chirurgie')
                                            <label class="container chekingfacteur">{{ $cIndication->titreContreIndication }}
                                                <input type="checkbox" name="Chir[]" value="{{ $cIndication->titreContreIndication }}">
                                                <span class="checkmark"></span>
                                            </label>
                                            @endif

                                            @endforeach
                                        </div>

                                        <h5>Contre Indication à la chimiothérapie:</h5>
                                        <div class="form-group">
                                            @foreach ( $tab1 as  $tab )
                                            @if($tab->OperationMedicale =='chimiotherapie')
                                            <label class="container chekingfacteur">{{ $tab->titreContreIndication }}
                                                <input type="checkbox" name="Chim[]" value="{{ $tab->titreContreIndication }}">
                                                <span class="checkmark"></span>
                                            </label>
                                            @endif

                                            @endforeach
                                        </div>

                                        <h5>Contre Indication à la radiothérapie:</h5>
                                        <div class="form-group">
                                            @foreach ( $tab2 as  $tab3 )
                                            @if($tab3->OperationMedicale =='radiotherapie')
                                            <label class="container chekingfacteur">{{ $tab3->titreContreIndication }}
                                                <input type="checkbox" name="Rad[]" value="{{ $tab3->titreContreIndication }}">
                                                <span class="checkmark"></span>
                                            </label>
                                            @endif

                                            @endforeach
                                        </div>
                                        <!-- Button -->
                                        <div class="form-group">

                                            <a class="collapsed btn btn-primary " role="button"
                                                data-toggle="collapse" data-parent="#accordion"
                                                href="#collapseSix">Suivant</a>

                                        </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!--complement de dossier-->

                    <div class="panel checkout-step">
                        <div>

                            <span class="checkout-step-number">6</span>
                            <h4 class="checkout-step-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseSix">Complément de Dossier
                                </a>
                            </h4>

                        </div>
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="checkout-step-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="checkout-login col-md-12">

                                            <div class="form-group" style="margin-top:10px;">
                                                <label>Resultat du 1er Traitement : </label>
                                                <label style="margin-top:10px;" class="container chekingfacteur">Echec du 1er Traitement
                                                    <input type="checkbox" name="RELIQUAT[]" value="NRM0">
                                                    <span class="checkmark"></span>
                                                </label>

                                                <label style="margin-left:35px;margin-top:20px;" class="container chekingfacteur">Reliquat sur T
                                                    <input type="checkbox" name="RELIQUAT[]" value="RELIQUAT_T">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label style="margin-left:35px;margin-top:20px;" class="container chekingfacteur">Reliquat sur N
                                                    <input type="checkbox" name="RELIQUAT[]" value="RELIQUAT_N">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="form-group" >
                                                <label style="margin-top:20px;">Chimiotherapie premiere : </label>
                                                <label style="margin-top:10px;" class="container chekingfacteur">Rèponse incomplète ou progression
                                                    <input type="checkbox" name="RCHIMIOINCOMPLETE" value="RCHIMIOINCOMPLETE">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="form-group" style="margin-top:10px;">
                                                <label>Rechute : </label>
                                                <label style="margin-top:10px;" class="container chekingfacteur">Rechute
                                                    <input type="checkbox" name="Rechute[]" value="Rechute">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label style="margin-left:35px;margin-top:20px;" class="container chekingfacteur">Rechute sur T
                                                    <input type="checkbox" name="Rechute[]" value="RECHUTE_T">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label style="margin-left:35px;margin-top:20px;margin-bottom:25px;" class="container chekingfacteur">Rechute sur N
                                                    <input type="checkbox" name="Rechute[]" value="RECHUTE_N">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <!-- Button -->
                                        <div class="form-group">

                                            <a class="collapsed btn btn-primary " role="button"
                                                data-toggle="collapse" data-parent="#accordion"
                                                href="#collapseSeven">Suivant</a>

                                        </div>




                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!--last for message-->

                    <div class="panel checkout-step">
                        <div>

                            <span class="checkout-step-number">7</span>
                            <h4 class="checkout-step-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseSeven">Joindre un Message
                                </a>
                            </h4>

                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse">
                            <div class="checkout-step-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="checkout-login col-md-12">
                                            <div class="form-group">
                                                <label for="message"> Message :</label>
                                                <textarea type="textarea" class="form-control" id="message"
                                                    placeholder="Entrer un Message" name="message">{{ old('message') }}</textarea>
                                                <label for="professeur" style="margin-top:10px;">Selectionner le professeur</label>
                                                <select name="professeurMessage" class="custom-select" tabindex="-1"
                                                        id="select-name">
                                                    <option value="0">tous les professeurs</option>
                                                    @foreach ($professeur as $professeur)
                                                    @if($professeur->email != 'residentCHU@gmail.com' && $professeur->email != 'contact.octopuschu@gmail.com')<option value="{{ $professeur->id }}">{{ $professeur->name }} {{ $professeur->prenom }}</option>@endif
                                                    @endforeach
                                                    </select>

                                            </div>




                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin: 30px;">Valider</button>
                    <a href="{{ route('patientsR') }}"><button type="button" class="btn btn-dark" style="margin-left:-25px;">Annuler</button></a>


                </form>
            </div>

        </div>
    </div>
</div>

@endsection
