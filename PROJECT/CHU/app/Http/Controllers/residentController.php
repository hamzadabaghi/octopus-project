<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use App\Dossier;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendReport;
use App\Opinion;
use App\Rcp;
use PDF;


class residentController extends Controller
{
    public function __construct()
    {
        $this->middleware('isResident');
        $this->middleware('RevalidateBackHistory');
        $this->middleware('auth');
    }

    public function home()
    {
        if (Auth::user()->email=="residentCHU@gmail.com"){
            return redirect('accueilR')->with('message', 'Bonjour');
        }
        elseif(Auth::user()->email!="residentCHU@gmail.com")
        {
            return redirect('accueil')->with('message', 'Bonjour');
        }
        else
        return redirect()->route('login');
    }

    public function accueil()
    {
        $nbDossiers = Dossier::count();
        $nbProf = User::count();
        $nbProf = $nbProf -2;
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

        return view('resident.accueil', ['nbDossiers' => $nbDossiers,
                                         'nbProf' => $nbProf,
                                         'nbDosTraites' => $nbDosTraites,
                                         'nbRcps' => $nbRcps]);
    }

    public function patients()
    {
        $Dossiers = Dossier::orderBy('created_at','desc')->paginate(10);
        return view('resident.patients', ['Dossiers' => $Dossiers]);
    }

    public function report()
    {
        return view('resident.report');
    }

    /* search*/
    public function search(Request $request)
    {
        $search = request()->input('q');
        $Dossiers = Dossier::where('ip', 'like', '%' . $search . '%')->paginate(10);
        return view('resident.patients', ['Dossiers' => $Dossiers]);
    }


    public function sendReport(Request $request)
    {
        Request()->validate(['message'=>'required','sujet'=>'required']);


        $messageReport = request('message');
        $sujet = request('sujet');

        $data = array(
            'name' =>'Medecin CHU' ,
             'message'=>$messageReport,
              'sujet' => $sujet);

        Mail::to('contact.octopuschu@gmail.com')->send(new sendReport($data));

        return redirect()->route('reportR')->with('feedback','Votre reclamation a été bien envoyée !!');
    }

    public function createPDF($idDossier){
        $dossier = Dossier::find($idDossier);
        $users = User::where('email', '!=', 'residentCHU@gmail.com')->get();
        $opinions = Opinion::where('idDossier', '=', $idDossier)->get();

        $pdf = PDF::loadView('prof.pdf', compact('users','dossier','opinions'));

        return $pdf->download($dossier->ip . '.pdf');
        //return response()->download('/path/to/file.pdf', 'example.pdf', [], 'inline');
    }
}
