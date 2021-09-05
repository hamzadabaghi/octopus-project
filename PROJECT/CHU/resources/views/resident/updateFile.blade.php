@extends('layouts.resident')

@section('patients')
class="active"
@endsection


@section('content')

<!--notice-->
<div class="container">
    <div class="notice notice-success">
      <strong>Modification du Dossier</strong>
    </div>
</div>

<!--end Notice-->


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div id="accordion" class="checkout">
                <form action="{{ route('updateFile',[$dossier]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!--zero-->

                    <div class="panel checkout-step">
                        <h3 style="text-align: center; margin-bottom: 30px; padding-bottom: 10px; border-bottom: 1px solid blue ;">{{$dossier->cancer}}</h3>
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
                                                    placeholder="Entrer le nom" name="nomR" value="{{ $dossier->nomR }}" />
                                            </div>
                                            @error('nomR')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('nomR') }}</p>
                                            @enderror
                                            <div class="form-group">
                                                <label for="prenomR">Prenom :</label>
                                                <input type="text" class="form-control @error ('prenomR') is-danger @enderror" id="prenomR"
                                                    placeholder="Entrer le prenom" name="prenomR" value="{{ $dossier->prenomR }} "/>
                                            </div>
                                            @error('prenomR')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('prenomR') }}</p>
                                            @enderror

                                            <div class="form-group">
                                                <label for="cin"> Cin :</label>
                                                <input type="text" class="form-control @error ('cin') is-danger @enderror" id="cin"
                                                    placeholder="Entrer le Cin" name="cin" value="{{ $dossier->cin }}"/>
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
                                                    placeholder="Entrer le IP du Patient" name="IP" value="{{ $dossier->ip }}"/>
                                            </div>
                                            @error('IP')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('IP') }}</p>
                                            @enderror

                                            <div class="form-group">
                                                <label for="nomP">Nom :</label>
                                                <input type="text" class="form-control @error ('nomP') is-danger @enderror" id="nomP"
                                                    placeholder="Entrer le nom" name="nomP" value="{{ $dossier->nomP }}"/>
                                            </div>
                                            @error('nomP')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('nomP') }}</p>
                                            @enderror
                                            <div class="form-group">
                                                <label for="prenomP">Prenom :</label>
                                                <input type="text" class="form-control @error ('prenomP') is-danger @enderror" id="prenomP"
                                                    placeholder="Entrer le prenom" name="prenomP" value="{{ $dossier->prenomP }}"/>
                                            </div>
                                            @error('prenomP')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('prenomP') }}</p>
                                            @enderror
                                            <div class="form-group">
                                                <label for="dateNaissance">Date de Naissance :</label>
                                                <input type="date" class="form-control @error ('dateNaissance') is-danger @enderror" id="dateNaissance"
                                                    placeholder="Entrer la dateNaissance" name="dateNaissance" value="{{ $dossier->dateN }}"/>
                                            </div>
                                            @error('dateNaissance')

                                            <p class="help is-danger" style="color:red;">{{ $errors->first('dateNaissance') }}</p>
                                            @enderror
                                            <div class="form-group">
                                                <label>Sexe :</label><br />
                                                <label class="form-check form-check-inline @error ('sexe') is-danger @enderror">
                                                    <input class="form-check-input" type="radio" name="sexe"
                                                        value="Masculin" {{ ($dossier->sexe == "Masculin") ? 'checked' :'' }}/>
                                                    <span class="form-check-label"> Masculin </span>
                                                </label>
                                                <label class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sexe"
                                                        value="Feminin" {{ ($dossier->sexe == "Feminin") ? 'checked' :'' }} />
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
                                    data-parent="#accordion" href="#collapseTwo">{{ ($dossier->cancer=='Cavite Orale') ? 'Localisation & Type Histologique' : 'Type Histologique' }}</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="checkout-step-body">
                                <div class="checout-address-step">
                                    <div class="row">
                                        <div class="col-lg-8">

                                            <!-- Localisation -->

                                            @if($dossier->cancer == "Cavite Orale" )
                                            <div class="form-group">
                                                <label class="col-md-12 control-label" for="address">Localisation
                                                    :</label>
                                                <div class="col-md-12 ">
                                                    <select name="localisation" class="custom-select" tabindex="-1"
                                                        id="select-name">
                                                        @foreach ($localisation as $localisation)
                                                        <option value="{{ $localisation->titreLocalisation }}" {{ ($dossier->localisation == $localisation->titreLocalisation) ? 'selected' :'' }}> {{ $localisation->titreLocalisation }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @endif

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
                                                            <option value="{{ $TypeHisto->titreTypeHisto }}" {{ ($dossier->TypeHt == $TypeHisto->titreTypeHisto ) ? 'selected' :'' }}>{{ $TypeHisto->titreTypeHisto }}</option>
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
                                                         <option value="{{ $TypeHisto->titreTypeHisto }}" {{ ($dossier->TypeHt == $TypeHisto->titreTypeHisto ) ? 'selected' :'' }}>{{ $TypeHisto->titreTypeHisto }}</option>
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
                                                    <input type="checkbox" name="FMP[]" value="{{ $FMP->titreFMP }}"   @if(is_array($dossier->FMP))@foreach ($dossier->FMP as $FMP2)
                                                    {{ ($FMP2 == $FMP->titreFMP ) ? 'checked' :'' }}
                                                    @endforeach @else {{ ($dossier->FMP == $FMP->titreFMP ) ? 'checked' :'' }} @endif >
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

                                        @if($dossier->cancer =="Oropharynx")
                                        <h5>p16</h5>
                                        <!--le p16 positive ou negatif -->
                                        <div class="form-group" style="margin-bottom:30px;">
                                            <select name="p16" class="custom-select" tabindex="-1"
                                                id="select-name">
                                                <option value="positif" {{ ($dossier->p16=="positif") ? 'selected' : '' }}>p16 positif (HPV)</option>
                                                <option value="negatif" {{ ($dossier->p16=="negatif") ? 'selected' : '' }}>p16 negatif (non HPV)</option>
                                            </select>
                                        </div>

                                        @endif

                                        <h5>cTNM</h5>
                                        @if($dossier->cancer !="Larynx")
                                        <div class="form-group">
                                            <label>T :</label>
                                            <select name="cT" class="custom-select" tabindex="-1"
                                                id="select-name">

                                                @php
                                                $tab1=$tab2=$cTNM

                                                @endphp
                                                @foreach ($cTNM as $cTNM)
                                                @if($cTNM->groupeCTNM =='T' || $cTNM->groupeCTNM =='cT')
                                                <option value="{{ $cTNM->titrecTNM }}" {{ ($dossier->cT == $cTNM->titrecTNM ) ? 'selected' :'' }} >{{ $cTNM->titrecTNM }}</option>
                                                @endif
                                                @endforeach

                                            </select>
                                        </div>
                                        @endif
                                        @if($dossier->cancer =="Larynx")
                                        <div class="form-group">
                                            <label>T :</label><br/>
                                            <label>Tumeurs Supraglottiques</label>
                                            <select name="cTumeurs_supraglottiques" class="custom-select" tabindex="-1"
                                                id="select-name">
                                                @php
                                                $tab6=$tab5=$tab1=$tab2=$cTNM

                                                @endphp
                                                @foreach ($cTNM as $cTNM)
                                                @if($cTNM->groupeCTNM =='Tumeurs supraglottiques')
                                                <option value="{{ $cTNM->titrecTNM }}" {{ ($dossier->cTumeurs_supraglottiques == $cTNM->titrecTNM ) ? 'selected' :'' }} >{{ $cTNM->titrecTNM }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            <label>Tumeurs sous Glottiques</label>
                                            <select name="cTumeurs_sous_glottiques" class="custom-select" tabindex="-1"
                                                id="select-name">

                                                @foreach ($tab6 as $cTNM)
                                                @if($cTNM->groupeCTNM =='Tumeurs sous glottiques')
                                                <option value="{{ $cTNM->titrecTNM }}" {{ ($dossier->cTumeurs_sous_glottiques == $cTNM->titrecTNM ) ? 'selected' :'' }}  >{{ $cTNM->titrecTNM }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            <label>Tumeurs Glottiques</label>
                                            <select name="cTumeurs_glottiques" class="custom-select" tabindex="-1"
                                                id="select-name">
                                                @foreach ($tab5 as $cTNM)
                                                @if($cTNM->groupeCTNM =='Tumeurs glottiques')
                                                <option value="{{ $cTNM->titrecTNM }}" {{ ($dossier->cTumeurs_glottiques == $cTNM->titrecTNM ) ? 'selected' :'' }}>{{ $cTNM->titrecTNM }}</option>
                                                @endif
                                                @endforeach

                                            </select>
                                        </div>
                                        @endif


                                        <div class="form-group">
                                            <label>N :</label>
                                            <select name="cN" class="custom-select" tabindex="-1"
                                                id="select-name">

                                                @foreach ($tab1 as $tab)
                                                @if($tab->groupeCTNM =='N' || $tab->groupeCTNM =='cN')
                                                <option value="{{ $tab->titrecTNM }}" {{ ($dossier->cN == $tab->titrecTNM) ? 'selected' :'' }} >{{ $tab->titrecTNM }}</option>
                                                @endif
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>M :</label>
                                            <select name="M" class="custom-select" tabindex="-1"
                                                id="select-name">

                                                @foreach ($tab2 as $tab)
                                                @if($tab->groupeCTNM =='M')
                                                <option value="{{ $tab->titrecTNM }}" {{ ($dossier->M == $tab->titrecTNM) ? 'selected' :'' }} >{{ $tab->titrecTNM }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <h5>pTNM</h5>

                                        @if($dossier->cancer =="Larynx")
                                        <div class="form-group">
                                            <label>T :</label>
                                            <label>Tumeurs supraglottiques</label>
                                            <select name="pTumeurs_supraglottiques" class="custom-select" tabindex="-1"
                                            id="select-name">
                                            @php $tab7=$tab8=$tab6=$pTNM @endphp
                                            @foreach ($pTNM as $pTNM)
                                            @if($pTNM->groupepTNM =='Tumeurs supraglottiques')
                                            <option value="{{ $pTNM->titrepTNM }}" {{ ($dossier->pTumeurs_supraglottiques == $pTNM->titrepTNM ) ? 'selected' :'' }}>{{ $pTNM->titrepTNM }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <label>Tumeurs sous Glottiques</label>
                                        <select name="pTumeurs_sous_glottiques" class="custom-select" tabindex="-1"
                                            id="select-name">
                                            @foreach ($tab7 as $pTNM)
                                            @if($pTNM->groupepTNM =='Tumeurs sous glottiques')
                                            <option value="{{ $pTNM->titrepTNM }}" {{ ($dossier->pTumeurs_sous_glottiques == $pTNM->titrepTNM ) ? 'selected' :'' }}>{{ $pTNM->titrepTNM }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <label>Tumeurs Glottiques</label>
                                        <select name="pTumeurs_glottiques" class="custom-select" tabindex="-1"
                                            id="select-name">

                                            @foreach ($tab8 as $pTNM)
                                            @if($pTNM->groupepTNM =='Tumeurs glottiques')
                                            <option value="{{ $pTNM->titrepTNM }}" {{ ($dossier->pTumeurs_glottiques == $pTNM->titrepTNM ) ? 'selected' :'' }}>{{ $pTNM->titrepTNM }}</option>
                                            @endif
                                            @endforeach
                                        </select>

                                        </div>
                                        @endif


                                        @if($dossier->cancer !="Larynx")
                                        <div class="form-group">
                                            <label>T :</label>
                                            <select name="pT" class="custom-select" tabindex="-1"
                                                id="select-name">

                                                @php $tab6=$pTNM @endphp
                                                @foreach ($pTNM as $pTNM1)
                                                @if($pTNM1->groupepTNM =='T' || $pTNM1->groupepTNM =='pT')
                                                <option value="{{ $pTNM1->titrepTNM }}" {{ ($dossier->pT == $pTNM1->titrepTNM) ? 'selected' :'' }} >{{ $pTNM1->titrepTNM }}</option>
                                                @endif
                                                @endforeach


                                            </select>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label>N :</label>
                                            <select name="pN" class="custom-select" tabindex="-1"
                                                id="select-name">

                                                @foreach ($tab6 as $tab)
                                                @if($tab->groupepTNM =='N' || $tab->groupepTNM =='pN')
                                                <option value="{{ $tab->titrepTNM }}" {{ ($dossier->pN == $tab->titrepTNM) ? 'selected' :'' }} >{{ $tab->titrepTNM }}</option>
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
                                    Indication a une Operation Medicale</a> </h4>
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
                                                <input type="checkbox" name="Chir[]" value="{{ $cIndication->titreContreIndication }}" @if(is_array($dossier->CIChirurgie)) @foreach ($dossier->CIChirurgie as $CIChirurgie1)
                                                {{ ($CIChirurgie1 == $cIndication->titreContreIndication) ? 'checked' :'' }}
                                                @endforeach @else
                                                {{  ($dossier->CIChirurgie == $cIndication->titreContreIndication) ? 'checked' :'' }} @endif>
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
                                                <input type="checkbox" name="Chim[]" value="{{ $tab->titreContreIndication }}" @if(is_array($dossier->CIChimiotherapie)) @foreach ($dossier->CIChimiotherapie as $CIChimiotherapie1)
                                                {{ ($CIChimiotherapie1 == $tab->titreContreIndication) ? 'checked' :'' }}
                                                @endforeach @else
                                                {{  ($dossier->CIChimiotherapie == $tab->titreContreIndication) ? 'checked' :'' }} @endif>
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
                                                <input type="checkbox" name="Rad[]" value="{{ $tab3->titreContreIndication }}" @if(is_array($dossier->CIRadiotherapie)) @foreach ($dossier->CIRadiotherapie as $CIRadiotherapie1)
                                                {{ ($CIRadiotherapie1 == $tab3->titreContreIndication) ? 'checked' :'' }}
                                                @endforeach @else
                                                {{  ($dossier->CIRadiotherapie == $tab3->titreContreIndication) ? 'checked' :'' }} @endif>
                                                <span class="checkmark"></span>
                                            </label>
                                            @endif

                                            @endforeach

                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <a class="collapsed btn btn-primary " role="button"
                                                    data-toggle="collapse" data-parent="#accordion"
                                                    href="#collapseSix">Suivant</a>
                                            </div>
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
                                                    <input type="checkbox" name="RELIQUAT[]" value="NON_REPONSE" @if(is_array($dossier->resultat_premier_traitement)) @foreach ($dossier->resultat_premier_traitement as $resultat_premier_traitement)
                                                    {{ ($resultat_premier_traitement == "NON_REPONSE") ? 'checked' :'' }}
                                                    @endforeach @else
                                                    {{  ($dossier->resultat_premier_traitement == "NON_REPONSE") ? 'checked' :'' }} @endif>
                                                    <span class="checkmark"></span>
                                                </label>

                                                <label style="margin-left:35px;margin-top:20px;" class="container chekingfacteur">Reliquat sur T
                                                    <input type="checkbox" name="RELIQUAT[]" value="RELIQUAT_T" @if(is_array($dossier->resultat_premier_traitement)) @foreach ($dossier->resultat_premier_traitement as $resultat_premier_traitement)
                                                    {{ ($resultat_premier_traitement == "RELIQUAT_T") ? 'checked' :'' }}
                                                    @endforeach @else
                                                    {{  ($dossier->resultat_premier_traitement == "RELIQUAT_T") ? 'checked' :'' }} @endif>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label style="margin-left:35px;margin-top:20px;" class="container chekingfacteur">Reliquat sur N
                                                    <input type="checkbox" name="RELIQUAT[]" value="RELIQUAT_N" @if(is_array($dossier->resultat_premier_traitement)) @foreach ($dossier->resultat_premier_traitement as $resultat_premier_traitement)
                                                    {{ ($resultat_premier_traitement == "RELIQUAT_N") ? 'checked' :'' }}
                                                    @endforeach @else
                                                    {{  ($dossier->resultat_premier_traitement == "RELIQUAT_N") ? 'checked' :'' }} @endif>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="form-group" >
                                                <label style="margin-top:20px;">Chimiotherapie premiere : </label>
                                                <label style="margin-top:10px;" class="container chekingfacteur">Rèponse incomplète ou progression
                                                    <input type="checkbox" name="RCHIMIOINCOMPLETE" value="RCHIMIOINCOMPLETE"  {{  ($dossier->chimiotherapie_premiere == "RCHIMIOINCOMPLETE") ? 'checked' :'' }}>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="form-group" style="margin-top:10px;">
                                                <label>Rechute : </label>
                                                <label style="margin-top:10px;" class="container chekingfacteur">Rechute
                                                    <input type="checkbox" name="Rechute[]" value="Rechute" @if(is_array($dossier->Rechute)) @foreach ($dossier->Rechute as $Rechute)
                                                    {{ ($Rechute == "Rechute") ? 'checked' :'' }}
                                                    @endforeach @else
                                                    {{  ($dossier->Rechute == "Rechute") ? 'checked' :'' }} @endif>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label style="margin-left:35px;margin-top:20px;" class="container chekingfacteur">Rechute sur T
                                                    <input type="checkbox" name="Rechute[]" value="RECHUTE_T" @if(is_array($dossier->Rechute)) @foreach ($dossier->Rechute as $Rechute)
                                                    {{ ($Rechute == "RECHUTE_T") ? 'checked' :'' }}
                                                    @endforeach @else
                                                    {{  ($dossier->Rechute == "RECHUTE_T") ? 'checked' :'' }} @endif>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <label style="margin-left:35px;margin-top:20px;margin-bottom:25px;" class="container chekingfacteur">Rechute sur N
                                                    <input type="checkbox" name="Rechute[]" value="RECHUTE_N" @if(is_array($dossier->Rechute)) @foreach ($dossier->Rechute as $Rechute)
                                                    {{ ($Rechute == "RECHUTE_N") ? 'checked' :'' }}
                                                    @endforeach @else
                                                    {{  ($dossier->Rechute == "RECHUTE_N") ? 'checked' :'' }} @endif>
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
                                    href="#collapseSeven">Message Joint
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
                                                    placeholder="Entrer un Message" name="message">{{ $dossier->message }}</textarea>
                                                    <label for="professeur" style="margin-top:10px;">Selectionner le professeur</label>
                                                    <select name="professeurMessage" class="custom-select" tabindex="-1"
                                                            id="select-name">
                                                        <option value="-1" {{ ($dossier->professeurMessage == '-1') ? 'selected' : '' }}></option>
                                                        <option value="0" {{ ($dossier->professeurMessage == '0') ? 'selected' : '' }}>tous les professeurs</option>
                                                        @foreach ($professeur as $professeur)
                                                        @if($professeur->email != 'residentCHU@gmail.com' && $professeur->email != 'contact.octopuschu@gmail.com' )<option value="{{ $professeur->id }}" {{ ($professeur->id == $dossier->professeurMessage) ? 'selected' : '' }}>{{ $professeur->name }} {{ $professeur->prenom }}</option>@endif
                                                        @endforeach
                                                        </select>
                                            </div>




                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="margin-top: 30px;margin-left: 30px;margin-bottom:20px;">Sauvgarder</button>
                    <a href="{{ route('showFile',[$dossier]) }}"><button type="button" class="btn btn-dark" style="margin-top: 30px;margin-left: 5px;margin-bottom:20px;">Annuler</button></a>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
