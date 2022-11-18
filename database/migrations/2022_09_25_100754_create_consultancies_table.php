<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultancies', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('services')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('patient_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('patients')
            ->delete('restrict')
            ->update('cascade');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('consultancies');
    }
}
