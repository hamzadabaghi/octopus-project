<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('idProf');
            $table->unsignedBigInteger('idDossier');
            $table->string('opnProf')->nullable();;
            $table->json('opnApp')->nullable();;
            $table->string('RP')->default('null');
            $table->json('opnAutresProfs')->nullable();
            $table->foreign('idDossier')
                  ->references('id')
                  ->on('dossiers')
                  ->onDelete('cascade');
            $table->foreign('idProf')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opinions');
    }
}
