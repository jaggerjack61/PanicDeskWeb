<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWellnessDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wellness_data', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->integer('anxiety');
            $table->integer('well_being');
            $table->integer('stress');
            $table->integer('agitation');
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
        Schema::dropIfExists('wellness_data');
    }
}
