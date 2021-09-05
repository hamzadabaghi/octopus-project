<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* route de home */
Route::get('/','residentController@home')->name('home');


Auth::routes([
    'register' => false
]);

//**************************************************************** */

Route::get('/accueil', 'profController1@accueil')->name('accueil');
Route::get('/accueilR', 'residentController@accueil')->name('accueilR');

Route::get('/patients', 'profController1@patients')->name('patients');
Route::post('/patientsSearch', 'profController1@patientsSearch')->name('patientsSearch');
Route::get('/patientsR', 'residentController@patients')->name('patientsR');

Route::get('/profil', 'profilController@profil')->name('profil');
Route::get('/editProfil', 'profilController@editProfil')->name('editProfil');
Route::post('/editerP', 'profilController@editerP')->name('editerP');

Route::get('/rcp', 'rcpController@rcp')->name('rcp');
Route::get('/rcpDossier/{idDossier}', 'rcpController@rcpDossier')->name('rcpDossier');
Route::post('/opinionProf/{idDossier}', 'rcpController@opinionProf')->name('opinionProf');
Route::post('/modifierOpnProf/{idDossier}', 'rcpController@modifierOpnProf')->name('modifierOpnProf');

Route::get('/createPDF/{idDossier}', 'rcpController@createPDF')->name('createPDF');
Route::get('/createPDF_R/{idDossier}', 'residentController@createPDF')->name('createPDF_R');

Route::get('/membre', 'membreController@membre')->name('membre');
Route::get('/addMembre1', 'membreController@addMembre1')->name('addMembre1');
Route::post('/addMembre2', 'membreController@addMembre2')->name('addMembre2');

Route::get('/report', 'profController1@report')->name('report');
Route::get('/reportR', 'residentController@report')->name('reportR');

Route::get('/addFile', 'addFileController@cancerOrl')->name('chooseCancer');

/* fin */
/* controle de saisie et de donnee des cancer  pour le resident */
Route::post('/caviteOrale', 'addFileController@caviteOrale')->name('caviteOrale');
Route::post('/nasopharynx', 'addFileController@nasopharynx')->name('nasopharynx');
Route::post('/hypopharynx', 'addFileController@hypopharynx')->name('hypopharynx');
Route::post('/oropharynx', 'addFileController@oropharynx')->name('oropharynx');
Route::post('/larynx', 'addFileController@larynx')->name('larynx');
/* fin */

/*show file resident*/
Route::get('/showFile/{id}', 'addFileController@showFile')->name('showFile');
/*editfile*/
Route::get('/showFile/{id}/edit', 'addFileController@edit')->name('editFile');
/*update file */
Route::put('/updateFile/{id}', 'addFileController@update')->name('updateFile');
/* delete File and checking*/
Route::post('/beforeDeleteFile/{id}', 'FileController@deleteFile')->name('deleteFile');
/*update file checking */
Route::post('/beforeUpdateFile/{id}', 'FileController@updateFile')->name('beforeUpdateFile');
/* send to rcp */
Route::post('/sendToRCP/{id}', 'FileController@sendRCP')->name('sendRCP');
/*search*/
Route::get('/search', 'residentController@search')->name('searchIP');
/* page report resident*/
Route::post('/reportBug', 'residentController@sendReport')->name('sendReport');
/* page report prof */
Route::post('/reportBugProf', 'profController1@sendReport')->name('sendReportProf');
