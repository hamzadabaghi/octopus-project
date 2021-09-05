<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtnmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctnms', function (Blueprint $table) {
            $table->id();
            $table->string('titrecTNM');
            $table->string('groupeCTNM');
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
        Schema::dropIfExists('ctnms');
    }
}
