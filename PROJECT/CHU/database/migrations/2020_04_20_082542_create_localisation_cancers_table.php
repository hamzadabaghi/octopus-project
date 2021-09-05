<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalisationCancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localisation_cancers', function (Blueprint $table) {
            $table->id();
            $table->string('titreLocalisation');
            $table->unsignedBigInteger('cancer');
            $table->foreign('cancer')
            ->references('id')
            ->on('cancers')
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
        Schema::dropIfExists('localisation_cancers');
    }
}
