<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dossier;
use App\Rcp;
use App\Decision;
use App\Opinion;
use Auth;
use DB;
use PDF;

class rcpController extends Controller
{
    public function __construct(){
        $this->middleware('isProf');
        $this->middleware('RevalidateBackHistory');
        $this->middleware('auth');
    }

/******************************************************FONCTION D'AFFICHAGE DES RCP****************************************************/

    public function rcp(Request $request){
        $user = Auth::User();
        $rcps = Rcp::where('id', '<>', 0)
                   ->where('finish', '<>', true)
                   ->orderBy('created_at','desc')
                   ->paginate(10);
        $dossiers = Dossier::all();
        $opinionsProf = Opinion::where('idProf', '=', $user->id)->get();
        $opns = Opinion::all();
        $nbProfs = User::count() - 2;

        /**********************ALGORITHME DES NOTIFICATIONS********************/
        $num = 0;
        $rcpNonFinies = Rcp::where('finish', '=', false)->get();
        foreach($rcpNonFinies as $rcp){
            $decisionsEnvoyees = Opinion::where('idProf', '=', $user->id)
                                        ->where('idDossier', '=', $rcp->idDossier)
                                        ->first();
            if($decisionsEnvoyees == null)
                $num++;
        }
        

        $ToutesRcps = Rcp::where('finish', '=', false)->get();

        foreach($ToutesRcps as $rcp){

            $opnProfConnecte = Opinion::where('idProf', '=', $user->id)
                                      ->where('idDossier', '=', $rcp->idDossier)->first();

            if($opnProfConnecte == null){
                $jours = 15 - now()->diff($rcp->created_at)->d;
                if($jours <= 0)
                    $num--;
            }

        }
        /**********************************************************************/


        return view('prof.rcp', ['user' => $user,
                                 'rcps' => $rcps,
                                 'dossiers' => $dossiers,
                                 'num' => $num,
                                 'opnsProf' => $opinionsProf,
                                 'opns' => $opns,
                                 'nbProfs' => $nbProfs]);
    }

//**************************************************************************************************************************************************/
/******************************************************FONCTION D'AFFICHAGE DES DOSSIERS DES RCP****************************************************/
//**************************************************************************************************************************************************/

    public function rcpDossier($idDossier){
        $user = Auth::User();

        $dossier = Dossier::where('id', '=', $idDossier)->first();
        $decision = Decision::where('idDossier', '=', $idDossier)->first();
        $opinions = Opinion::where('idDossier', '=', $idDossier)->count();
        $nbProfs = User::count() - 2;
        $rcp = Rcp::where('idDossier', '=', $idDossier)->first(); //POUR TESTER LE DELAI DE LA RCP (15 JOURS)

        if($rcp->finish)
            $message = 'pret';
        else
            $message = 'pasEncore';

        
        
        
            $decPersonnelle = Opinion::where('idDossier', '=', $idDossier)
                                 ->where('idProf', '=', $user->id)->first();


        $message2 = 'possible';
        if($decPersonnelle != null){
            if($decPersonnelle->opnProf != null)
                $message2 = 'impossible';
        }


        /**********************ALGORITHME DE DECISIONS DES PROFS********************/
        $users = User::where('email', '!=', 'residentCHU@gmail.com')
                     ->where('email', '!=', 'contact.octopuschu@gmail.com')
                     ->get();

        $opnsProfs = Opinion::where('idProf', '<>', $user->id)
                            ->where('idDossier', '=', $idDossier)->get();
        /**********************************************************************/

        /**********************ALGORITHME DES NOTIFICATIONS********************/
        $num = 0;
        $rcpNonFinies = Rcp::where('finish', '=', false)->get();
        foreach($rcpNonFinies as $rcp){
            $decisionsEnvoyees = Opinion::where('idProf', '=', $user->id)
                                        ->where('idDossier', '=', $rcp->idDossier)
                                        ->first();
            if($decisionsEnvoyees == null)
                $num++;
        }
        

        $ToutesRcps = Rcp::where('finish', '=', false)->get();

        foreach($ToutesRcps as $rcp){

            $opnProfConnecte = Opinion::where('idProf', '=', $user->id)
                                      ->where('idDossier', '=', $rcp->idDossier)->first();

            if($opnProfConnecte == null){
                $jours = 15 - now()->diff($rcp->created_at)->d;
                if($jours <= 0)
                    $num--;
            }

        }
        /**********************************************************************/



        return view('prof.rcpDossier', ['user' => $user,
                                        'dossier' => $dossier,
                                        'decision' => $decision,
                                        'message' => $message,
                                        'message2' => $message2,
                                        'decPersonnelle' => $decPersonnelle,
                                        'num' => $num,
                                        'opnsProfs' => $opnsProfs,
                                        'users' => $users,
                                        'rcp' => $rcp]);
    }

//******************************************************************************************************************************************/
/******************************************************FONCTION D'ENREGISTREMENT D'OPINION**************************************************/
//******************************************************************************************************************************************/

    public function opinionProf(Request $request, $idDossier){
        $user = Auth::User();
        $opinion = new Opinion();


        $opinion->idProf = $user->id;
        $opinion->idDossier = $idDossier;

/************************************L'INSERTION DE decApp***************************************/

        if(request('decApp') != null)
            $opinion->opnApp = request('decApp');


/************************************L'INSERTION DE decProf**************************************/

        if(request('decProf') != null)
            $opinion->opnProf = request('decProf');


/***************************************L'INSERTION DE RP****************************************/

        if(request('RP') != null)
            $opinion->RP = request('RP');
        else
            $opinion->RP = 'null';

/*************************L'insertion des decisions des autres profs*****************************/

        if(request('opnAutresProfs') != null)
            $opinion->opnAutresProfs = request('opnAutresProfs');

/************************************************************************************************/

        $opinion->save();


/************************************Modification de la RCP***************************************/
        $opinions = Opinion::where('idDossier', '=', $idDossier)->count();
        $nbProfs = User::count() - 2;

        if($opinions == $nbProfs){
            $rcp = Rcp::where('idDossier', '=', $idDossier)->first();
            $rcp->finish = true;
            $rcp->save();
        }
/*************************************************************************************************/


        return redirect()->back()->with('mess', 'Votre décision a été bien envoyée !!');
    }
//********************************************************************************************************************************************/
//*****************************************************FONCTION DE MODIFICATION D'OPINION*****************************************************/
//********************************************************************************************************************************************/

    public function modifierOpnProf(Request $request, $idDossier){
        $user = Auth::User();



        $opinion = Opinion::where('idProf', '=', $user->id)
                          ->where('idDossier', '=', $idDossier)->first();
/************************************L'INSERTION DE decApp***************************************/

        if(request('decApp') != null)
            $opinion->opnApp = request('decApp');
        else
            $opinion->opnApp = null;

/************************************L'INSERTION DE decProf**************************************/

        if(request('decProf') != null)
            $opinion->opnProf = request('decProf');
        else
            $opinion->opnProf = null;

/***************************************L'INSERTION DE RP****************************************/

        if(request('RP') != null)
            $opinion->RP = request('RP');
        else
            $opinion->RP = 'null';

/*************************L'insertion des decisions des autres profs*****************************/

        if(request('opnAutresProfs') != null)
            $opinion->opnAutresProfs = request('opnAutresProfs');
        else
            $opinion->opnAutresProfs = null;

/************************************************************************************************/

        $opinion->save();


/************************************Modification de la RCP***************************************/
$opinions = Opinion::where('idDossier', '=', $idDossier)->count();
$nbProfs = User::count() - 2;

if($opinions == $nbProfs){
    $rcp = Rcp::where('idDossier', '=', $idDossier)->first();
    $rcp->finish = 1;
    $rcp->save();
}
/*************************************************************************************************/


        return redirect()->back()->with('mess', 'Votre décision a été bien modifiée !!');

    }

    public function createPDF($idDossier){
        $dossier = Dossier::find($idDossier);

        $users = User::where('email', '!=', 'residentCHU@gmail.com')
                     ->where('email', '!=', 'contact.octopuschu@gmail.com')
                     ->get();

        $opinions = Opinion::where('idDossier', '=', $idDossier)->get();

        $pdf = PDF::loadView('prof.pdf', compact('users','dossier','opinions'));

        return $pdf->download($dossier->ip . '.pdf');
        //return response()->download('/path/to/file.pdf', 'example.pdf', [], 'inline');
    }

}
