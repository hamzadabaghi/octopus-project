<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rcp;
use App\Opinion;
use Auth;
use Hash;
use DB;

class membreController extends Controller
{
    public function __construct()
    {
        $this->middleware('isProf');
        $this->middleware('RevalidateBackHistory');
        $this->middleware('auth');
    }

    public function membre()
    {
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

        $users = DB::select('SELECT * FROM users where name != "resident" and  name != "admin"  and departement = 1 ');
        return view('prof.membre', [
            'user' => $user,
            'users' => $users,
            'num' => $num
        ]);
    }

    public function addMembre1()
    {
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

        return view('prof.addMembre', [
            'user' => $user,
            'num' => $num
        ]);
    }

    public function addMembre2(Request $request)
    {
        $user = Auth::User();

        $prof = new User();

        $this->validate($request, [
            'name' => 'required',
            'prenom' => 'required',
            'dateN' => 'required',
            'telephone' => 'required',
            'specialite' => 'required',
            'email' => 'required|email|unique:users'
        ], ['email.unique' => 'L\'email que vous avez saisi existe deja !!']);



        $prof->name = $request->input('name');
        $prof->prenom = $request->input('prenom');
        $prof->dateN = $request->input('dateN');
        $prof->telephone = $request->input('telephone');
        $prof->specialite = $request->input('specialite');
        $prof->departement= $request->input('departement');
        $prof->email = $request->input('email');
        $prof->password = Hash::make($request->input('name') . "" . $request->input('prenom'));

        $prof->save();

        return redirect('/membre')->with('message', 'Le professeur a été bien ajouté !!');
    }
}
