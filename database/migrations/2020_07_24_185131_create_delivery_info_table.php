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
            $table->string('del_address');
            $table->string('del_brgy');
            $table->string('del_city');
            $table->string('del_province');
            $table->integer('del_zipcode');
            $table->string('del_country');
            $table->string('del_others');
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
