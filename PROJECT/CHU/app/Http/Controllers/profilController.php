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

class profilController extends Controller
{
    public function __construct(){
        $this->middleware('isProf');
        $this->middleware('RevalidateBackHistory');
        $this->middleware('auth');
    }

    public function profil(){
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

        return view('prof.profil', ['user' => $user,
                                    'num' => $num]);
    }

    public function editProfil(Request $request){
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

        return view('prof.editProfil', ['user' => $user,
                                        'num' => $num]);
    }


    public function editerP(Request $request){

        $user = Auth::User();


        $this->validate($request, [
            'name' => 'required',
            'prenom' => 'required',
            'image' => 'image|nullable|max:1999',
            'telephone' => 'required',
            'email' => 'required',
            'password0' => 'required',
            'password' => 'required|min:8',
            'password2' => 'required'], ['password.min' => 'Le mot de passe doit avoir au moins 8 caractères !!']);

        if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore =null;
        }

//*****************************************************TEST DE L'EMAIL************************************************************/
        $users = User::where('email', '!=', $user->email)->get();
        $drp = 0;
        if(!$users->isEmpty()){
            foreach($users as $usr){
                if(request('email') == $usr->email){
                    $drp = 1;
                }
            }
        }

        if($drp == 1)
            return redirect('/editProfil')->with('erreur', 'L\'email que vous avez saisi existe deja !!');
 //*******************************************************************************************************************************/

        if(!Hash::check($request->input('password0'), $user->password))
            return redirect('/editProfil')->with('erreur', 'Votre ancien mot de passe est incorrect !!');

        if($request->input('password') !== $request->input('password2'))
            return redirect('/editProfil')->with('erreur', 'Le mot de passe de confirmation ne correspond pas !!');


            $user->name = $request->input('name');
            $user->prenom = $request->input('prenom');
            $user->telephone = $request->input('telephone');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            if($fileNameToStore!=null)
            $user->image =  $fileNameToStore;

            $user->save();

            return redirect('/profil')->with('message','Vos modifications ont été bien enregistrées !!');

    }
}
