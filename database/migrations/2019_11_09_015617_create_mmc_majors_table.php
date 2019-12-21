<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMmcMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mmc_majors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mmc_deptid')->nullable();
            $table->string('mmc_majorid')->unique();
            $table->string('r');
            $table->string('g');
            $table->string('b');
            $table->string('mmc_majorname');
            $table->string('mmc_description')->nullable();
            $table->string('r');
            $table->string('g');
            $table->string('b');
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
        Schema::dropIfExists('mmc_majors');
    }
}
