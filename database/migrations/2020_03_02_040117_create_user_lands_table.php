<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_lands', function (Blueprint $table) {
            $table->bigIncrements('land_id');
            $table->string('name_of_company');
            $table->string('land_address');
            $table->string('land_area');
            $table->string('land_elevation');
            $table->integer('user_id');
            $table->string('land_image');
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
        Schema::dropIfExists('user_lands');
    }
}
