<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\dossier;
use App\User;
use App\Rcp;


class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('isResident');
        $this->middleware('RevalidateBackHistory');
        $this->middleware('auth');
    }



    public function deleteFile(Request $request, $id)
    {
        Request()->validate([

            'nomR' => 'required',
            'prenomR' => 'required',
            'cin' => 'required'
        ]);

        $dossier = dossier::findOrFail($id);

        $a = 0;

        if ($dossier->nomR == request('nomR')) {
            if ($dossier->prenomR == request('prenomR')) {
                if ($dossier->cin == request('cin')) {
                    $a = 1;
                }
            }
        }

        if ($a == 1) {
            $dossier->delete();
            return redirect()->route('patientsR')->with('fedbackdelete','le dossier a été supprimé avec succès');;
        } else {

            return redirect()->route('showFile', [$dossier])->with('erreurResident','les informations de résident sont incorrectes');

        }
    }
    public function updateFile(Request $request, $id)
    {
        Request()->validate([

            'nomR' => 'required',
            'prenomR' => 'required',
            'cin' => 'required'
        ]);

        $dossier = dossier::findOrFail($id);


        $a = 0;

        if ($dossier->nomR == request('nomR')) {
            if ($dossier->prenomR == request('prenomR')) {
                if ($dossier->cin == request('cin')) {
                    $a = 1;
                }
            }
        }

        if ($a == 1) {

            return redirect()->route('editFile',[$id]);
        } else {

            return redirect()->route('showFile', [$dossier])->with('erreurResident','les informations de résident sont incorrectes');

        }
    }

    public function sendRCP(Request $request, $id)
    {
        Request()->validate([

            'nomR' => 'required',
            'prenomR' => 'required',
            'cin' => 'required'
        ]);

        $dossier = dossier::findOrFail($id);

        $a = 0;

        if ($dossier->nomR == request('nomR')) {
            if ($dossier->prenomR == request('prenomR')) {
                if ($dossier->cin == request('cin')) {
                    $a = 1;
                }
            }
        }

        if ($a == 1) {
            $NewRCP = new Rcp();
            $NewRCP->idDossier = $id;
            $NewRCP->save();
            return redirect()->route('showFile',[$dossier])->with('message','le dossier a été bien envoyé à la RCP');
        } else {
            return redirect()->route('showFile', [$dossier])->with('erreurResident','les informations de résident sont incorrectes');
        }
    }
}
