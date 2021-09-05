<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFMPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_m_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('titreFMP');
            $table->string('groupeFMP')->nullable();
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
        Schema::dropIfExists('f_m_p_s');
    }
}
