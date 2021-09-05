<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nomR');
            $table->string('prenomR');
            $table->string('cin');
            $table->string('ip');
            $table->string('nomP');
            $table->string('prenomP');
            $table->date('dateN');
            $table->string('sexe');
            $table->string('localisation')->nullable();
            $table->string('TypeHt');
            $table->json('FMP')->nullable();
            $table->string('cT')->nullable();
            $table->string('cN')->nullable();
            $table->string('M')->nullable();
            $table->string('pT')->nullable();
            $table->string('pN')->nullable();
            $table->string('p16')->nullable();
            $table->string('cTumeurs_supraglottiques')->nullable();
            $table->string('cTumeurs_sous_glottiques')->nullable();
            $table->string('cTumeurs_glottiques')->nullable();
            $table->string('pTumeurs_supraglottiques')->nullable();
            $table->string('pTumeurs_sous_glottiques')->nullable();
            $table->string('pTumeurs_glottiques')->nullable();
            $table->json('CIChirurgie');
            $table->json('CIChimiotherapie');
            $table->json('CIRadiotherapie');
            $table->string('etat')->default('non traité');
            $table->string('cancer');
            $table->json('resultat_premier_traitement')->nullable();
            $table->string('chimiotherapie_premiere')->nullable();
            $table->json('Rechute')->nullable();
            $table->text('message')->nullable();
            $table->Integer('professeurMessage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dossiers');
    }
}
