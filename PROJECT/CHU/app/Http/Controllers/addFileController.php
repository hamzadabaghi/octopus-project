<?php

namespace App\Http\Controllers;

use App\ContreIndicationOperation;
use Illuminate\Http\Request;
use App\Dossier;
use App\FMP;
use App\LocalisationCancer;
use App\TypeHistologique;
use App\ctnm;
use App\ptnm;
use App\Cancer;
use App\User;
use App\Rcp;
use App\Opinion;
use App\Decision;
use phpDocumentor\Reflection\Types\Null_;



class addFileController extends Controller
{
    public function __construct()
    {
        $this->middleware('isResident');
        $this->middleware('RevalidateBackHistory');
        $this->middleware('auth');
    }


    /* methode de redirection vers le formulaire de cancer choisis */


    public function cancerOrl()
    {


        /* liste des professeur */

        $professeur = User::all();


        /* Cavite orale */

        $Localisation = LocalisationCancer::where('cancer', '1')->get();
        $TypeHisto1 = TypeHistologique::where('cancer', '1')->get();
        $FMP1 = FMP::where('cancer', '1')->get();
        $cTNM1 = ctnm::where('cancer', '1')->get();
        $pTNM1 = ptnm::where('cancer', '1')->get();
        $cIndication1 = ContreIndicationOperation::where('cancer', '1')->get();


        /*nasopharynx*/

        $TypeHisto2 = TypeHistologique::where('cancer', '3')->get();
        $FMP2 = FMP::where('cancer', '3')->get();
        $cTNM2 = ctnm::where('cancer', '3')->get();
        $pTNM2 = ptnm::where('cancer', '3')->get();
        $cIndication2 = ContreIndicationOperation::where('cancer', '3')->get();

        /*Hypopharynx*/

        $TypeHisto3 = TypeHistologique::where('cancer', '4')->get();
        $FMP3 = FMP::where('cancer', '4')->get();
        $cTNM3 = ctnm::where('cancer', '4')->get();
        $pTNM3 = ptnm::where('cancer', '4')->get();
        $cIndication3 = ContreIndicationOperation::where('cancer', '4')->get();

        /*oropharynx*/

        $TypeHisto4 = TypeHistologique::where('cancer', '5')->get();
        $FMP4 = FMP::where('cancer', '5')->get();
        $cTNM4 = ctnm::where('cancer', '5')->get();
        $pTNM4 = ptnm::where('cancer', '5')->get();
        $cIndication4 = ContreIndicationOperation::where('cancer', '5')->get();

        /*larynx*/

        $TypeHisto5 = TypeHistologique::where('cancer', '2')->get();
        $FMP5 = FMP::where('cancer', '2')->get();
        $cTNM5 = ctnm::where('cancer', '2')->get();
        $pTNM5 = ptnm::where('cancer', '2')->get();
        $cIndication5 = ContreIndicationOperation::where('cancer', '2')->get();

        /* traitement*/

        $choix = request('cancer');

        if ($choix == "Cavite Orale" || !$choix)
            return view('resident.cancer.caviteOrale', ['localisation' => $Localisation, 'TypeHisto' => $TypeHisto1, 'FMP' => $FMP1, 'cTNM' => $cTNM1, 'pTNM' => $pTNM1, 'cIndication' => $cIndication1, 'professeur' => $professeur]);

        elseif ($choix == "Nasopharynx")
            return view('resident.cancer.pharynx.nasopha', ['TypeHisto' => $TypeHisto2, 'FMP' => $FMP2, 'cTNM' => $cTNM2, 'pTNM' => $pTNM2, 'cIndication' => $cIndication2, 'professeur' => $professeur]);

        elseif ($choix == "Hypopharynx")
            return view('resident.cancer.pharynx.hypopha', ['TypeHisto' => $TypeHisto3, 'FMP' => $FMP3, 'cTNM' => $cTNM3, 'pTNM' => $pTNM3, 'cIndication' => $cIndication3, 'professeur' => $professeur]);

        elseif ($choix == "Oropharynx")
            return view('resident.cancer.pharynx.oropha', ['TypeHisto' => $TypeHisto4, 'FMP' => $FMP4, 'cTNM' => $cTNM4, 'pTNM' => $pTNM4, 'cIndication' => $cIndication4, 'professeur' => $professeur]);

        elseif ($choix == "Larynx")
            return view('resident.cancer.larynx', ['TypeHisto' => $TypeHisto5, 'FMP' => $FMP5, 'cTNM' => $cTNM5, 'pTNM' => $pTNM5, 'cIndication' => $cIndication5, 'professeur' => $professeur]);
    }


    /* methode de traitement de cancer cavite orale */


    public function caviteOrale(Request $request)
    {

        Request()->validate([

            'nomR' => 'required',
            'prenomR' => 'required',
            'cin' => 'required',
            'IP' => 'required',
            'nomP' => 'required',
            'prenomP' => 'required',
            'dateNaissance' => 'required',
            'sexe' => 'required',

        ]);

        $dossier = new Dossier();
        $cancer = Cancer::findOrFail(1);

        $dossier->nomR = request('nomR');
        $dossier->prenomR = request('prenomR');
        $dossier->cin = request('cin');
        $dossier->ip = request('IP');
        $dossier->nomP = request('nomP');
        $dossier->prenomP = request('prenomP');
        $dossier->dateN = request('dateNaissance');
        $dossier->sexe = request('sexe');
        $dossier->localisation = request('localisation');
        $dossier->TypeHT = request('TH');
        if (request('FMP') != null) {
            $dossier->FMP = request('FMP');
        } else {
            $dossier->FMP = 'pas de Facteurs mauvais pronostic';
        }
        $dossier->cT = request('cT');
        $dossier->cN = request('cN');
        $dossier->M = request('M');
        $dossier->pT = request('pT');
        $dossier->pN = request('pN');
        $dossier->cancer = $cancer->titreCancer;
        $dossier->message = request('message');
        if ($dossier->message == null) {
            $dossier->professeurMessage = '-1';
        } else {
            $dossier->professeurMessage = request('professeurMessage');
        }

        if (request('Chir') == null)
            $dossier->CIChirurgie = 'la Chirurgie est possible';
        else
            $dossier->CIChirurgie = request('Chir');

        if (request('Chim') == null)
            $dossier->CIChimiotherapie = 'la Chimiotherapie est possible';
        else
            $dossier->CIChimiotherapie = request('Chim');

        if (request('Rad') == null) {
            $dossier->CIRadiotherapie = 'la radiotherapie est possible';
        } else {
            $dossier->CIRadiotherapie = request('Rad');
        }


        if (request('RELIQUAT') != null)
        $dossier->resultat_premier_traitement = request('RELIQUAT');
    else
    $dossier->resultat_premier_traitement = null;

    if (request('RCHIMIOINCOMPLETE') != null)
        $dossier->chimiotherapie_premiere = request('RCHIMIOINCOMPLETE');
    else
    $dossier->chimiotherapie_premiere =null;
    if (request('Rechute') != null)
        $dossier->Rechute = request('Rechute');
    else
    $dossier->Rechute = null;







        $dossier->save();



        $decision = new Decision();

        $decisions = array();

        if (request('Rechute') == null){
            if(request('M') == 'M1'){
                if($dossier->CIChimiotherapie != 'la Chimiotherapie est possible')
                    array_push($decisions,"Traitement palliatif");
            }else{
                if(request('cT') == 'Tx')
                    array_push($decisions,"Chirurgie + Surveillance");
                elseif(request('cT') == 'T1' || request('cT') == 'T2'){
                    if($dossier->CIChimiotherapie != 'la Chimiotherapie est possible'){
                        if($dossier->CIChirurgie != 'la Chirurgie est possible'){
                                if($dossier->CIRadiotherapie == 'la radiotherapie est possible')
                                    if(request('pN') != 'pNx' && request('pN') != 'pN0')
                                        array_push($decisions,"RTH");
                        }else{
                                if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                    if(request('pN') != 'pNx' && request('pN') != 'pN0'){
                                        array_push($decisions,"Chirurgie + RTH");
                                        array_push($decisions,"Curiethérapie sur T1 + Chirurgie sur N + RTH sur N");
                                    }else{
                                        array_push($decisions,"Chirurgie");
                                        array_push($decisions,"Curiethérapie sur T1 + Chirurgie sur N");
                                    }
                            }else{
                                    array_push($decisions,"Chirurgie");
                                    array_push($decisions,"Curiethérapie sur T1 + Chirurgie sur N");
                                }
                        }
                    }else{
                        if($dossier->CIChirurgie != 'la Chirurgie est possible'){
                                if($dossier->CIRadiotherapie == 'la radiotherapie est possible')
                                    if(request('pN') != 'pNx' && request('pN') != 'pN0'){
                                        array_push($decisions,"RTH");
                                        array_push($decisions,"RadioChimiothérapie");
                                    }
                        }else{
                                if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                    if(request('pN') != 'pNx' && request('pN') != 'pN0'){
                                        array_push($decisions,"Chirurgie + RTH");
                                        array_push($decisions,"Curiethérapie sur T1 + Chirurgie sur N + RTH sur N");
                                        array_push($decisions,"RadioChimiothérapie");
                                    }else{
                                        array_push($decisions,"Chirurgie");
                                        array_push($decisions,"Curiethérapie sur T1 + Chirurgie sur N");
                                        array_push($decisions,"RadioChimiothérapie");
                                    }
                            }else{
                                    array_push($decisions,"Chirurgie");
                                    array_push($decisions,"Curiethérapie sur T1 + Chirurgie sur N");

                        }}
                    }


            }elseif(request('cT') == 'T3'){
                if($dossier->CIChimiotherapie != 'la Chimiotherapie est possible'){
                    if($dossier->CIChirurgie != 'la Chirurgie est possible'){
                        if($dossier->CIRadiotherapie == 'la radiotherapie est possible')
                                if(request('pN') != 'pNx' && request('pN') != 'pN0')
                                    array_push($decisions,"RTH sur T + RTH sur N");
                                else
                                    array_push($decisions,"RTH sur T");
                    }else{
                        if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                if(request('pN') != 'pNx' && request('pN') != 'pN0')
                                    array_push($decisions,"Chirurgie sur N + RTH sur T + RTH sur N");
                                else
                                    array_push($decisions,"Chirurgie sur N + RTH sur T");
                        }else
                                array_push($decisions,"Chirurgie sur N");
                    }
                }else{
                    if($dossier->CIChirurgie != 'la Chirurgie est possible'){
                        if($dossier->CIRadiotherapie == 'la radiotherapie est possible')
                                if(request('pN') != 'pNx' && request('pN') != 'pN0'){
                                    array_push($decisions,"RTH sur T + RTH sur N");
                                    array_push($decisions,"RadioChimiothérapie");
                                }else{
                                    array_push($decisions,"RTH sur T");
                                    array_push($decisions,"RadioChimiothérapie");
                                }
                    }else{
                        if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                if(request('pN') != 'pNx' && request('pN') != 'pN0'){
                                    array_push($decisions,"Chirurgie sur N + RTH sur T + RTH sur N");
                                    array_push($decisions,"RadioChimiothérapie");
                                }
                                else{
                                    array_push($decisions,"Chirurgie sur N + RTH sur T");
                                    array_push($decisions,"RadioChimiothérapie");
                                }
                        }else
                                array_push($decisions,"Chirurgie sur N");
                    }
                }
            }elseif(request('cT') == 'T4'){
                if($dossier->CIChimiotherapie != 'la Chimiotherapie est possible'){
                    if($dossier->CIChirurgie != 'la Chirurgie est possible'){
                        if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                if(request('pN') != 'pNx' && request('pN') != 'pN0'){
                                    array_push($decisions,"Chirurgie du reliquat tumorale + RTH sur T + RTH sur N");
                                    array_push($decisions,"RadioChimiothérapie");
                                }else{
                                    array_push($decisions,"Chirurgie du reliquat tumorale + RTH sur T");
                                    array_push($decisions,"RadioChimiothérapie");
                                }
                        }else{
                                array_push($decisions,"Chirurgie du reliquat tumorale");
                        }
                    }else{
                        if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                if(request('pN') != 'pNx' && request('pN') != 'pN0'){
                                    array_push($decisions,"Chimiothérapie(premiere) + Chirurgie + RTH systématique");
                                    array_push($decisions,"RadioChimiothérapie concomittante");
                                    array_push($decisions,"Chirurgie sur N + RTH sur T + RTH sur N");
                                }else{
                                    array_push($decisions,"Chimiothérapie(premiere) + Chirurgie + RTH systématique");
                                    array_push($decisions,"RadioChimiothérapie concomittante");
                                    array_push($decisions,"Chirurgie sur N + RTH sur T");
                                }
                        }else{
                                array_push($decisions,"Chimiothérapie(premiere) + Chirurgie");
                                array_push($decisions,"Chirurgie sur N");
                        }
                    }
                }else{
                    if($dossier->CIChirurgie != 'la Chirurgie est possible')
                        if($dossier->CIRadiotherapie == 'la radiotherapie est possible')
                                array_push($decisions,"Chirurgie sur N et T + RTH");
                        else
                                array_push($decisions,"Chirurgie sur N et T");
                }

            }
        }
    }

        $decision->idDossier = $dossier->id;
        $decision->decision = $decisions;
        $decision->save();



        return redirect()->route('showFile', [$dossier])->with('message', 'Le dossier a été bien enregistré !!');
    }



    /* methode de traitement de cancer nasopharynx */


    public function nasopharynx(Request $request)
    {


        Request()->validate([

            'nomR' => 'required',
            'prenomR' => 'required',
            'cin' => 'required',
            'IP' => 'required',
            'nomP' => 'required',
            'prenomP' => 'required',
            'dateNaissance' => 'required',
            'sexe' => 'required',

        ]);

        $dossier = new Dossier();
        $decision = new Decision();
        $decisions = array();

        $cancer = Cancer::findOrFail(3);

        $dossier->nomR = request('nomR');
        $dossier->prenomR = request('prenomR');
        $dossier->cin = request('cin');
        $dossier->ip = request('IP');
        $dossier->nomP = request('nomP');
        $dossier->prenomP = request('prenomP');
        $dossier->dateN = request('dateNaissance');
        $dossier->sexe = request('sexe');
        $dossier->TypeHT = request('TH');
        if (request('FMP') != null) {
            $dossier->FMP = request('FMP');
        } else {
            $dossier->FMP = 'pas de Facteurs mauvais pronostic';
        }
        $dossier->cT = request('cT');
        $dossier->cN = request('cN');
        $dossier->M = request('M');
        $dossier->pT = request('pT');
        $dossier->pN = request('pN');
        $dossier->cancer = $cancer->titreCancer;
        $dossier->message = request('message');
        if ($dossier->message == null) {
            $dossier->professeurMessage = '-1';
        } else {
            $dossier->professeurMessage = request('professeurMessage');
        }

        if (request('Chir') == null)
            $dossier->CIChirurgie = 'la Chirurgie est possible';
        else
            $dossier->CIChirurgie = request('Chir');

        if (request('Chim') == null)
            $dossier->CIChimiotherapie = 'la Chimiotherapie est possible';
        else
            $dossier->CIChimiotherapie = request('Chim');

        if (request('Rad') == null)
            $dossier->CIRadiotherapie = 'la radiotherapie est possible';
        else
            $dossier->CIRadiotherapie = request('Rad');




        if (request('RELIQUAT') != null)
            $dossier->resultat_premier_traitement = request('RELIQUAT');
        else
            $dossier->resultat_premier_traitement = null;

        if (request('RCHIMIOINCOMPLETE') != null)
            $dossier->chimiotherapie_premiere = request('RCHIMIOINCOMPLETE');
        else
            $dossier->chimiotherapie_premiere = null;
        if (request('Rechute') != null)
            $dossier->Rechute = request('Rechute');
        else
            $dossier->Rechute = null;






        /*algorithme*/

        if ($dossier->M == 'M0' &&  $dossier->resultat_premier_traitement == null) {
            if ($dossier->cN == 'cN0') {
                if ($dossier->cT == 'cT1' || $dossier->cT == 'cT2') {
                    if ($dossier->CIRadiotherapie == 'la radiotherapie est possible') {
                        array_push($decisions, "Radiothérapie");
                    }
                } elseif ($dossier->cT == 'cT3' || $dossier->cT == 'cT4') {
                    if ($dossier->CIRadiotherapie == 'la radiotherapie est possible' && $dossier->CIChimiotherapie == 'la Chimiotherapie est possible') {
                        array_push($decisions, "RadioChimiothérapie");
                    }
                }
            } elseif ($dossier->cN == 'cN1' || $dossier->cN == 'cN2' || $dossier->cN == 'cN3') {
                if ($dossier->CIRadiotherapie == 'la radiotherapie est possible' && $dossier->CIChimiotherapie == 'la Chimiotherapie est possible') {
                    array_push($decisions, "RadioChimiothérapie");
                }
            }
        } elseif ($dossier->M == 'M0' &&  $dossier->resultat_premier_traitement != null) {
            if (in_array("RELIQUAT_N", $dossier->resultat_premier_traitement)) {
                if ($dossier->CIChirurgie == 'la Chirurgie est possible') {
                    array_push($decisions, "Chirurgie");
                }
            }
        } elseif ($dossier->M == 'M1') {
            if (request('RCHIMIOINCOMPLETE') != null && request('RCHIMIOINCOMPLETE') == "RCHIMIOINCOMPLETE") {
                array_push($decisions, "Traitement Palliatif");
            } elseif ($dossier->CIRadiotherapie == 'la radiotherapie est possible') {
                array_push($decisions, "Radiothérapie sur T et sur N");
            }
        }
        if ($dossier->Rechute != null) {
            if (in_array("RECHUTE_T", $dossier->Rechute)) {
                if ($dossier->CIRadiotherapie == 'la radiotherapie est possible') {
                    array_push($decisions, "Radiothérapie");
                    array_push($decisions, "Curithérapie + Radiothérapie");
                    array_push($decisions, "Curithérapie");
                } else {
                    array_push($decisions, "Curithérapie");
                }
            }
            if (in_array("RECHUTE_N", $dossier->Rechute)) {
                if ($dossier->CIChirurgie == 'la Chirurgie est possible') {
                    if ($dossier->CIRadiotherapie == 'la radiotherapie est possible') {
                        array_push($decisions, "Chirurgie + Radiotherapie");
                    } else
                        array_push($decisions, "Chirurgie");
                } elseif ($dossier->CIRadiotherapie == 'la radiotherapie est possible') {
                    array_push($decisions, "Radiotherapie");
                }
            }
        }

        /*fin algorithme*/
        $dossier->save();
        $decision->idDossier = $dossier->id;
        $decision->decision = $decisions;
        $decision->save();


        return redirect()->route('showFile', [$dossier])->with('message', 'Le dossier a été bien enregistré !!');
    }


    /* methode de traitement de cancer hypopharynx */


    public function hypopharynx(Request $request)
    {


        Request()->validate([

            'nomR' => 'required',
            'prenomR' => 'required',
            'cin' => 'required',
            'IP' => 'required',
            'nomP' => 'required',
            'prenomP' => 'required',
            'dateNaissance' => 'required',
            'sexe' => 'required',

        ]);

        $dossier = new Dossier();
        $decision = new Decision();
        $decisions = array();

        $cancer = Cancer::findOrFail(4);

        $dossier->nomR = request('nomR');
        $dossier->prenomR = request('prenomR');
        $dossier->cin = request('cin');
        $dossier->ip = request('IP');
        $dossier->nomP = request('nomP');
        $dossier->prenomP = request('prenomP');
        $dossier->dateN = request('dateNaissance');
        $dossier->sexe = request('sexe');
        $dossier->TypeHT = request('TH');
        if (request('FMP') != null) {
            $dossier->FMP = request('FMP');
        } else {
            $dossier->FMP = 'pas de Facteurs mauvais pronostic';
        }
        $dossier->cT = request('cT');
        $dossier->cN = request('cN');
        $dossier->M = request('M');
        $dossier->pT = request('pT');
        $dossier->pN = request('pN');
        $dossier->cancer = $cancer->titreCancer;
        $dossier->message = request('message');
        if ($dossier->message == null) {
            $dossier->professeurMessage = '-1';
        } else {
            $dossier->professeurMessage = request('professeurMessage');
        }

        if (request('Chir') == null)
            $dossier->CIChirurgie = 'la Chirurgie est possible';
        else
            $dossier->CIChirurgie = request('Chir');

        if (request('Chim') == null)
            $dossier->CIChimiotherapie = 'la Chimiotherapie est possible';
        else
            $dossier->CIChimiotherapie = request('Chim');

        if (request('Rad') == null)
            $dossier->CIRadiotherapie = 'la radiotherapie est possible';
        else
            $dossier->CIRadiotherapie = request('Rad');



        if (request('RELIQUAT') != null)
            $dossier->resultat_premier_traitement = request('RELIQUAT');
        else
            $dossier->resultat_premier_traitement = null;

        if (request('RCHIMIOINCOMPLETE') != null)
            $dossier->chimiotherapie_premiere = request('RCHIMIOINCOMPLETE');
        else
            $dossier->chimiotherapie_premiere = null;
        if (request('Rechute') != null)
            $dossier->Rechute = request('Rechute');
        else
            $dossier->Rechute = null;





        /*algorithme*/


        if (request('M') == 'M1') {
            array_push($decisions, 'Traitement palliatif');
        } elseif (request('M') == 'M0') {
            if (request('RELIQUAT') == null) {
                if ($dossier->CIRadiotherapie == 'la radiotherapie est possible') {
                    if (request('cT') == 'cT1' || request('cT') == 'cT2') {
                        array_push($decisions, 'Radiochimiothérapie sur T et sur N');


                        if ($dossier->CIChirurgie == 'la Chirurgie est possible') {
                            if ((request('pN') != 'pNx' && request('pN') != 'pN0' ) || in_array("Berges chirurgicales atteinte (positives ou moins de 5mm)=R+", $dossier->FMP)) /* Facteurs de R+ */ {
                                array_push($decisions, 'Chirurgie + Radiothérapie');
                                array_push($decisions, 'Radiothérapie sur T et sur N');
                                if ($dossier->CIChimiotherapie == 'la Chimiotherapie est possible') {
                                    array_push($decisions, 'Chirurgie sur le N + Radiothérapie sur T et sur N + Chimiotherapie');
                                }
                            } else {
                                array_push($decisions, 'Chirurgie');
                                array_push($decisions, 'Chirurgie sur le N');
                            }
                        }
                        if ($dossier->CIChimiotherapie == 'la Chimiotherapie est possible') {
                            array_push($decisions, 'Chimiotherapie');
                        }
                    } elseif (request('cT') == 'cT3') {
                        array_push($decisions, 'Protocole de conservation d\'organe');
                        if ($dossier->CIChimiotherapie == 'la Chimiotherapie est possible') {
                            if ($dossier->CIChirurgie == 'la Chirurgie est possible') {
                                array_push($decisions, 'Chirurgie + Radiothérapie');
                            } else
                                array_push($decisions, 'Radiothérapie');
                        }


                        if ($dossier->CIChirurgie == 'la Chirurgie est possible') {
                            if ($dossier->CIChimiotherapie == 'la Chimiotherapie est possible') {
                                array_push($decisions, 'Radiochimiothérapie');
                            }
                            if (request('pN') != 'pNx' && request('pN') != 'pN0') {
                                array_push($decisions, 'Radiothérapie sur T et sur N + chirurgie sur N ');
                            } else
                                array_push($decisions, 'Radiothérapie sur T + chirurgie sur N ');
                        } elseif (request('pN') != 'pNx' && request('pN') != 'pN0') {
                            array_push($decisions, 'Radiothérapie sur T et sur N ');
                        } else {
                            array_push($decisions, 'Radiothérapie sur T');
                        }
                    } elseif (request('cT') == 'cT4') {
                        if ($dossier->CIChirurgie == 'la Chirurgie est possible') {


                            if (request('pN') != 'pNx' && request('pN') != 'pN0') {
                                array_push($decisions, 'radiothérapie sur T et sur N + chirurgie sur N ');
                            } else {
                                array_push($decisions, 'radiothérapie sur T + chirurgie sur N ');
                            }

                            if ($dossier->CIChimiotherapie == 'la Chimiotherapie est possible') {
                                array_push($decisions, 'chimiothérapie 1ere + chirurgie + radiothérapie');
                                if (request('RCHIMIOINCOMPLETE') == null) {
                                    array_push($decisions, 'chimiothérapie 1ere + radiochimiothérapie');
                                } else
                                    array_push($decisions, 'chimiothérapie 1ere');
                            } else {
                                array_push($decisions, 'chirurgie + radiothérapie');
                            }
                        } else {
                            array_push($decisions, 'Traitement Palliatif');

                            if ($dossier->CIChimiotherapie == 'la Chimiotherapie est possible') {
                                array_push($decisions, 'Radiochimiothérapie');
                            }
                        }
                    }
                }
            }
        }


        /*fin d'algorithme */


        $dossier->save();
        $decision->idDossier = $dossier->id;
        $decision->decision = $decisions;
        $decision->save();


        return redirect()->route('showFile', [$dossier])->with('message', 'Le dossier a été bien enregistré !!');
    }


    /* methode de traitement de cancer oropharynx */


    public function oropharynx(Request $request)
    {


        Request()->validate([

            'nomR' => 'required',
            'prenomR' => 'required',
            'cin' => 'required',
            'IP' => 'required',
            'nomP' => 'required',
            'prenomP' => 'required',
            'dateNaissance' => 'required',
            'sexe' => 'required',

        ]);

        $dossier = new Dossier();
        $cancer = Cancer::findOrFail(5);

        $dossier->nomR = request('nomR');
        $dossier->prenomR = request('prenomR');
        $dossier->cin = request('cin');
        $dossier->ip = request('IP');
        $dossier->nomP = request('nomP');
        $dossier->prenomP = request('prenomP');
        $dossier->dateN = request('dateNaissance');
        $dossier->sexe = request('sexe');
        $dossier->TypeHT = request('TH');
        if (request('FMP') != null) {
            $dossier->FMP = request('FMP');
        } else {
            $dossier->FMP = 'pas de Facteurs mauvais pronostic';
        }

        $dossier->p16 = request('p16');
        $dossier->cT = request('cT');
        $dossier->cN = request('cN');
        $dossier->M = request('M');
        $dossier->pT = request('pT');
        $dossier->pN = request('pN');
        $dossier->cancer = $cancer->titreCancer;
        $dossier->message = request('message');
        if ($dossier->message == null) {
            $dossier->professeurMessage = '-1';
        } else {
            $dossier->professeurMessage = request('professeurMessage');
        }

        if (request('Chir') == null)
            $dossier->CIChirurgie = 'la Chirurgie est possible';
        else
            $dossier->CIChirurgie = request('Chir');

        if (request('Chim') == null)
            $dossier->CIChimiotherapie = 'la Chimiotherapie est possible';
        else
            $dossier->CIChimiotherapie = request('Chim');

        if (request('Rad') == null)
            $dossier->CIRadiotherapie = 'la radiotherapie est possible';
        else
            $dossier->CIRadiotherapie = request('Rad');


        if (request('RELIQUAT') != null)
            $dossier->resultat_premier_traitement = request('RELIQUAT');
        else
            $dossier->resultat_premier_traitement = null;

        if (request('RCHIMIOINCOMPLETE') != null)
            $dossier->chimiotherapie_premiere = request('RCHIMIOINCOMPLETE');
        else
        $dossier->chimiotherapie_premiere =null;
        if (request('Rechute') != null)
            $dossier->Rechute = request('Rechute');
        else
        $dossier->Rechute = null;

        $dossier->save();

        $decision = new Decision();
        $decisions = array();


        if(request('Rechute') == null){
            if(request('M') == 'M1'){
                array_push($decisions, 'Traitement palliatif');
            }else{
                if(request('RELIQUAT') == null){
                    if(request('cT') == 'cT1' || request('cT') == 'cT2'){
                        if(request('cN') == 'cN0' || request('cN') == 'cN1'){
                            if($dossier->CIChirurgie == 'la Chirurgie est possible'){
                                if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                    array_push($decisions, 'Chirurgie sur T et sur N');
                                    if(request('pN') != 'pNx' && request('pN') != 'pN0'){
                                        array_push($decisions, 'RTH sur T + Chirurgie sur N + RTH sur N');
                                        array_push($decisions, 'RTH + Curithérapie sur le T et le RTH sur N');
                                    }else{
                                        array_push($decisions, 'RTH sur T + Chirurgie sur N');
                                    }
                                }else{
                                    array_push($decisions, 'Chirurgie sur T et sur N');
                                }
                            }else{
                                if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                    if(request('pN') != 'pNx' && request('pN') != 'pN0'){
                                        array_push($decisions, 'RTH sur T + RTH sur N');
                                        array_push($decisions, 'RTH + Curithérapie sur le T et le RTH sur N');
                                    }else{
                                        array_push($decisions, 'RTH sur T');
                                    }
                                }
                            }
                        }else{
                            if($dossier->CIChirurgie == 'la Chirurgie est possible'){
                                if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                    if($dossier->CIChimiotherapie == 'la Chimiotherapie est possible'){
                                        array_push($decisions, 'Chirurgie sur T et sur le N + RTH + Chimiothérapie');
                                    }else{
                                        array_push($decisions, 'Chirurgie sur T et sur le N + RTH');
                                    }
                                }
                            }else{
                                if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                    array_push($decisions, 'RTH + thérapie ciblée');
                                    if($dossier->CIChimiotherapie == 'la Chimiotherapie est possible'){
                                        array_push($decisions, 'RadioChimiothérapie');
                                    }
                                }
                            }
                        }

                    }else{
                        if($dossier->CIChirurgie == 'la Chirurgie est possible'){
                            if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                if($dossier->CIChimiotherapie == 'la Chimiotherapie est possible'){
                                    array_push($decisions, 'Chirurgie sur T et sur le N + RTH + Chimiothérapie');
                                }else{
                                    array_push($decisions, 'Chirurgie sur T et sur le N + RTH');
                                }
                            }
                        }else{
                            if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                array_push($decisions, 'RTH + thérapie ciblée');
                                if($dossier->CIChimiotherapie == 'la Chimiotherapie est possible'){
                                    array_push($decisions, 'RadioChimiothérapie');
                                }
                            }
                        }
                    }
                }
            }
        }

        $decision->idDossier = $dossier->id;
        $decision->decision = $decisions;
        $decision->save();



        return redirect()->route('showFile', [$dossier])->with('message', 'Le dossier a été bien enregistré !!');
    }

    /* methode de traitement de cancer larynx */


    public function larynx(Request $request)
    {


        Request()->validate([

            'nomR' => 'required',
            'prenomR' => 'required',
            'cin' => 'required',
            'IP' => 'required',
            'nomP' => 'required',
            'prenomP' => 'required',
            'dateNaissance' => 'required',
            'sexe' => 'required',

        ]);

        $dossier = new Dossier();
        $cancer = Cancer::findOrFail(2);

        $dossier->nomR = request('nomR');
        $dossier->prenomR = request('prenomR');
        $dossier->cin = request('cin');
        $dossier->ip = request('IP');
        $dossier->nomP = request('nomP');
        $dossier->prenomP = request('prenomP');
        $dossier->dateN = request('dateNaissance');
        $dossier->sexe = request('sexe');
        $dossier->TypeHT = request('TH');
        if (request('FMP') != null) {
            $dossier->FMP = request('FMP');
        } else {
            $dossier->FMP = 'pas de Facteurs mauvais pronostic';
        }

        $dossier->cTumeurs_supraglottiques = request('cTumeurs_supraglottiques');
        $dossier->cTumeurs_sous_glottiques = request('cTumeurs_sous_glottiques');
        $dossier->cTumeurs_glottiques = request('cTumeurs_glottiques');
        $dossier->cN = request('cN');
        $dossier->M = request('M');
        $dossier->pTumeurs_supraglottiques = request('pTumeurs_supraglottiques');
        $dossier->pTumeurs_sous_glottiques = request('pTumeurs_sous_glottiques');
        $dossier->pTumeurs_glottiques = request('pTumeurs_glottiques');
        $dossier->pN = request('pN');
        $dossier->cancer = $cancer->titreCancer;
        $dossier->message = request('message');
        if ($dossier->message == null) {
            $dossier->professeurMessage = '-1';
        } else {
            $dossier->professeurMessage = request('professeurMessage');
        }

        if (request('Chir') == null)
            $dossier->CIChirurgie = 'la Chirurgie est possible';
        else
            $dossier->CIChirurgie = request('Chir');

        if (request('Chim') == null)
            $dossier->CIChimiotherapie = 'la Chimiotherapie est possible';
        else
            $dossier->CIChimiotherapie = request('Chim');

        if (request('Rad') == null)
            $dossier->CIRadiotherapie = 'la radiotherapie est possible';
        else
            $dossier->CIRadiotherapie = request('Rad');



            if (request('RELIQUAT') != null)
            $dossier->resultat_premier_traitement = request('RELIQUAT');
        else
        $dossier->resultat_premier_traitement = null;

        if (request('RCHIMIOINCOMPLETE') != null)
            $dossier->chimiotherapie_premiere = request('RCHIMIOINCOMPLETE');
        else
        $dossier->chimiotherapie_premiere =null;
        if (request('Rechute') != null)
            $dossier->Rechute = request('Rechute');
        else
        $dossier->Rechute = null;

        $dossier->save();

        $decision = new Decision();
        $decisions = array();

        if(request('Rechute') == null){
            if(request('M') == 'M1'){
                array_push($decisions, 'Traitement palliatif');
            }else{
                if(request('RELIQUAT') == null){
                    if(request('cTumeurs_supraglottiques') == 'T1' || request('cTumeurs_supraglottiques') == 'T2' || request('cTumeurs_sous_glottiques') == 'T1' || request('cTumeurs_sous_glottiques') == 'T2' || request('pTumeurs_glottiques') == 'T1' || request('pTumeurs_glottiques') == 'T2'){
                        if($dossier->CIChirurgie == 'la Chirurgie est possible'){
                            if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                if(request('pN') != 'pNx' && request('pN') != 'pN0'){
                                    array_push($decisions, 'Chirurgie + RTH sur N');
                                    array_push($decisions, 'RTH sur T et sur N');
                                }else{
                                    array_push($decisions, 'Chirurgie');
                                    array_push($decisions, 'RTH sur T');
                                }
                                array_push($decisions, 'Chirurgie sur N + RTH sur T');
                            }
                        }
                    }elseif(request('cTumeurs_supraglottiques') == 'T3' || request('cTumeurs_sous_glottiques') == 'T3' || request('pTumeurs_glottiques') == 'T3'){
                        array_push($decisions, 'Protocole de conservation d\'organe');
                    }else{
                        if($dossier->CIChirurgie == 'la Chirurgie est possible'){
                            if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                if($dossier->CIChimiotherapie == 'la Chimiotherapie est possible'){
                                    if(request('RCHIMIOINCOMPLETE') == null){
                                        array_push($decisions, 'RadioChimiothérapie');
                                    }else{
                                        array_push($decisions, 'Chirurgie + Radiothérapie');
                                    }
                                }else{
                                    array_push($decisions, 'Chirurgie + Radiothérapie +/- Thérapies ciblées');
                                }
                            }
                        }else{
                            if($dossier->CIRadiotherapie == 'la radiotherapie est possible'){
                                array_push($decisions, 'RTH + Thérapies ciblées');
                                if($dossier->CIChimiotherapie == 'la Chimiotherapie est possible'){
                                    array_push($decisions, 'RadioChimiothérapie');
                                }
                            }
                        }
                    }
                }
            }
        }

        $decision->idDossier = $dossier->id;
        $decision->decision = $decisions;
        $decision->save();

        return redirect()->route('showFile', [$dossier])->with('message', 'Le dossier a été bien enregistré !!');
    }

    /* methode de redirection vers la page d'affichage de dossier*/


    public function showFile($id)
    {
        $professeur = User::all();
        $dossier = Dossier::findOrFail($id);
        $dossierRCP = Rcp::where('idDossier', '=', $id)->first();

        if($dossierRCP != null){
            if ($dossierRCP->finish == true)
            $message = 'pret';
            else{
                $jours = 15 - now()->diff($dossierRCP->created_at)->d;
                    if($jours <= 0)
                        $message = 'pret';
                    else
                        $message = 'pas encore';
            }
        }else{
            $message = 'pas encore';
        }
        


        return view('resident.showFile', [
            'dossier' => $dossier,
            'professeur' => $professeur,
            'indice' => $dossierRCP,
            'mess' => $message
        ]);
    }

    /* methode1 de traitement de modification de cancer */


    public function edit($id)
    {
        $professeur = User::all();
        /* Cavite orale */
        $dossier = Dossier::findOrFail($id);

        $a = 0;

        switch ($dossier->cancer) {
            case 'Cavite Orale':
                $a = 1;
                break;
            case 'Larynx':
                $a = 2;
                break;
            case 'Nasopharynx':
                $a = 3;
                break;
            case 'Hypopharynx':
                $a = 4;
                break;
            case 'Oropharynx':
                $a = 5;
                break;
        }

        if ($a == 1) {
            $Localisation = LocalisationCancer::where('cancer', $a)->get();
        }

        $TypeHisto = TypeHistologique::where('cancer', $a)->get();
        $FMP = FMP::where('cancer',  $a)->get();
        $cTNM = ctnm::where('cancer',  $a)->get();
        $pTNM = ptnm::where('cancer',  $a)->get();
        $cIndication = ContreIndicationOperation::where('cancer', $a)->get();

        /* file*/

        if ($a == 1) {
            return view('resident.updateFile', ['dossier' => $dossier, 'localisation' => $Localisation, 'TypeHisto' => $TypeHisto, 'FMP' => $FMP, 'cTNM' => $cTNM, 'pTNM' => $pTNM, 'cIndication' => $cIndication, 'professeur' => $professeur]);
        } else {
            return view('resident.updateFile', ['dossier' => $dossier, 'TypeHisto' => $TypeHisto, 'FMP' => $FMP, 'cTNM' => $cTNM, 'pTNM' => $pTNM, 'cIndication' => $cIndication, 'professeur' => $professeur]);
        }
    }

    /* methode2 de traitement de modification de cancer */


    public function update($id)
    {


        Request()->validate([

            'nomR' => 'required',
            'prenomR' => 'required',
            'cin' => 'required',
            'IP' => 'required',
            'nomP' => 'required',
            'prenomP' => 'required',
            'dateNaissance' => 'required',
            'sexe' => 'required',

        ]);

        $dossier = Dossier::findOrFail($id);

        $a = 0;

        switch ($dossier->cancer) {
            case 'Cavite Orale':
                $a = 1;
                break;
            case 'Larynx':
                $a = 2;
                break;
            case 'Nasopharynx':
                $a = 3;
                break;
            case 'Hypopharynx':
                $a = 4;
                break;
            case 'Oropharynx':
                $a = 5;
                break;
        }

        $dossier->nomR = request('nomR');
        $dossier->prenomR = request('prenomR');
        $dossier->cin = request('cin');
        $dossier->ip = request('IP');
        $dossier->nomP = request('nomP');
        $dossier->prenomP = request('prenomP');
        $dossier->dateN = request('dateNaissance');
        $dossier->sexe = request('sexe');

        if ($a == 1) {
            $dossier->localisation = request('localisation');
        }

        $dossier->TypeHT = request('TH');
        if (request('FMP') != null) {
            $dossier->FMP = request('FMP');
        } else {
            $dossier->FMP = 'pas de Facteurs mauvais pronostic';
        }

        /* n'est pas commun */


        if ($a == 5) {
            $dossier->p16 = request('p16');
        }


        if ($a != 2) {
            $dossier->cT = request('cT');

            $dossier->pT = request('pT');
        }
        if ($a == 2) {

            $dossier->cTumeurs_supraglottiques = request('cTumeurs_supraglottiques');
            $dossier->cTumeurs_sous_glottiques = request('cTumeurs_sous_glottiques');
            $dossier->cTumeurs_glottiques = request('cTumeurs_glottiques');
            $dossier->pTumeurs_supraglottiques = request('pTumeurs_supraglottiques');
            $dossier->pTumeurs_sous_glottiques = request('pTumeurs_sous_glottiques');
            $dossier->pTumeurs_glottiques = request('pTumeurs_glottiques');
        }


        /* fin */

        /* commun */
        $dossier->pN = request('pN');
        $dossier->cN = request('cN');
        $dossier->M = request('M');
        $dossier->message = request('message');
        if ($dossier->message == null) {
            $dossier->professeurMessage = '-1';
        } else {
            $dossier->professeurMessage = request('professeurMessage');
        }

        if (request('Chir') == null)
            $dossier->CIChirurgie = 'la Chirurgie est possible';
        else
            $dossier->CIChirurgie = request('Chir');

        if (request('Chim') == null)
            $dossier->CIChimiotherapie = 'la Chimiotherapie est possible';
        else
            $dossier->CIChimiotherapie = request('Chim');

        if (request('Rad') == null)
            $dossier->CIRadiotherapie = 'la radiotherapie est possible';
        else
            $dossier->CIRadiotherapie = request('Rad');


        if (request('RELIQUAT') != null)
            $dossier->resultat_premier_traitement = request('RELIQUAT');
        else
        $dossier->resultat_premier_traitement = null;

        if (request('RCHIMIOINCOMPLETE') != null)
            $dossier->chimiotherapie_premiere = request('RCHIMIOINCOMPLETE');
        else
        $dossier->chimiotherapie_premiere =null;
        if (request('Rechute') != null)
            $dossier->Rechute = request('Rechute');
        else
        $dossier->Rechute = null;



        $dossier->save();


        return redirect()->route('showFile', [$dossier])->with('message', 'Vos modifications ont été bien enregistrées !!');

        /* commun */
    }
}
