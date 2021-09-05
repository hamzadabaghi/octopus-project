<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $casts = ['opnApp' => 'array',
                        'opnAutresProfs' => 'array'];
    
   
}
