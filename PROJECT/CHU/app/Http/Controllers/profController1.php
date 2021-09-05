<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dossier;
use App\Rcp;
use App\Decision;
use App\Opinion;
use Auth;
use Hash;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendReport;

class profController1 extends Controller
{
    public function __construct(){
        $this->middleware('isProf');
        $this->middleware('RevalidateBackHistory');
        $this->middleware('auth');
    }

    public function accueil(){
        $user = Auth::User();
        $nbDossiers = Dossier::count();
        $nbProfs = User::count() - 2;
        $nbRcps = Rcp::count();

        /*********************ALGORITHME DES DOSSIERS TRAITES******************/

        $nbDosTraites = Rcp::where('finish', '=', true)->count();

        $ToutesRcpsNonFinies = Rcp::where('finish', '=', false)->get();

        foreach($ToutesRcpsNonFinies as $rcp){

            $jours = 15 - now()->diff($rcp->created_at)->d;
            if($jours <= 0)
                $nbDosTraites++;

        }

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

        return view('prof.accueil', ['user' => $user,
                                     'nbDossiers' => $nbDossiers,
                                     'nbProfs' => $nbProfs,
                                     'nbRcps' => $nbRcps,
                                     'num' => $num,
                                     'nbDosTraites' => $nbDosTraites]);
    }

    public function patients(){
        $user = Auth::User();
        $dossiers = Dossier::where('id', '!=', '-1')->orderBy('created_at','desc')->paginate(10);
        $opinions = Opinion::all();
        $nbProfs = User::count() - 1;
        $rcps = Rcp::all();

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



        return view('prof.patients', ['user' => $user,
                                      'dossiers' => $dossiers,
                                      'num' => $num,
                                      'opinions' => $opinions,
                                      'nbProfs' => $nbProfs,
                                      'rcps' => $rcps]);
    }


    protected function patientsSearch(Request $request)
    {
        $this->validate($request, ['ip' => 'required']);

        $user = Auth::User();
        $opinions = Opinion::all();
        $dossier = Dossier::where('ip', '=', request('ip'))->orderBy('created_at','desc')->get();
        $nbProfs = User::count() - 1;

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


        if($dossier->isEmpty())
            return redirect('/patients')->with('mess', 'Ce patient n\'existe pas !!');
        else
        {
            $tableau = array();
            foreach($dossier as $dos)
            {
                $rcp = Rcp::where('idDossier', '=', $dos->id)->first();
                if($rcp != null)
                    array_push($tableau, $dos);
            }

            if($tableau == null)
                return redirect('/patients')->with('mess', 'Ce patient n\'existe pas !!');
            else{
                $rcps = Rcp::all();
                return view('prof.patientsSearch', ['user' => $user,
                                                    'dossiers' => $tableau,
                                                    'num' => $num,
                                                    'opinions' => $opinions,
                                                    'nbProfs' => $nbProfs,
                                                    'rcps' => $rcps]);
            }
                
        }

    }


    public function report(){
        $user = Auth::User();

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

        return view('prof.report', ['user' => $user,
                                    'num' => $num]);
    }

    public function sendReport(Request $request){

        Request()->validate(['message'=>'required','sujet' =>'required']);

        $user = Auth::User();


        $messageReport = request('message');
        $sujet = request('sujet');

        $data = array(
            'name' => $user->name . " " . $user->prenom,
             'message'=>$messageReport,
              'sujet' => $sujet);

        Mail::to('contact.octopuschu@gmail.com')->send(new sendReport($data));

        return redirect()->back()->with('feedback','Votre reclamation a été bien envoyée !!');
    }

}
