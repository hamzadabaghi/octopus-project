<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $casts = ['FMP' => 'array',
                        'CIChirurgie' => 'array',
                        'CIChimiotherapie' => 'array',
                        'CIRadiotherapie' => 'array',
                        'resultat_premier_traitement'=> 'array',
                        'Rechute'=> 'array'

                ];


}
