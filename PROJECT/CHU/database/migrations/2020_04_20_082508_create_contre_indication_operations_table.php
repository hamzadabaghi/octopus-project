<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContreIndicationOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contre_indication_operations', function (Blueprint $table) {
            $table->id();
            $table->string('titreContreIndication');
            $table->string('OperationMedicale');
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
        Schema::dropIfExists('contre_indication_operations');
    }
}
