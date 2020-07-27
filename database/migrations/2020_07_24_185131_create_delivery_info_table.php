<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_info', function (Blueprint $table) {
            $table->bigIncrements('del_id');
            $table->integer('user_id');
            $table->string('del_address')->nullable();
            $table->string('del_brgy')->nullable();
            $table->string('del_city')->nullable();
            $table->string('del_province')->nullable();
            $table->integer('del_zipcode')->nullable();
            $table->string('del_country')->nullable();
            $table->string('del_others')->nullable();
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
        Schema::dropIfExists('delivery_info');
    }
}
