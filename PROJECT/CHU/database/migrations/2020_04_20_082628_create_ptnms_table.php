<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtnmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptnms', function (Blueprint $table) {
            $table->id();
            $table->string('titrepTNM');
            $table->string('groupepTNM');
            $table->unsignedBigInteger('cancer');
            $table->string('p16');
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
        Schema::dropIfExists('ptnms');
    }
}
