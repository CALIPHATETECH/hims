<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_services', function (Blueprint $table) {
            $table->id();
            $table->integer('staff_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('staff')
            ->delete('restrict')
            ->update('cascade');
            $table->integer('service_id')
            ->unsigned()
            ->nullable()
            ->foreign()
            ->references('id')
            ->on('services')
            ->delete('restrict')
            ->update('cascade');
            $table->string('status')->default(1);
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
        Schema::dropIfExists('staff_services');
    }
}
