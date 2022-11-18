<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigations', function (Blueprint $table) {
            $table->id();
            $table->integer('consultancy_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('consultancies')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('test_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('tests')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('result_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('results')
            ->delete('restrict')
            ->update('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investigations');
    }
}
