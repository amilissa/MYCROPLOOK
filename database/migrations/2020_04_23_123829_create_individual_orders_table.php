<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_orders', function (Blueprint $table) {
            $table->bigIncrements('io_id');
            $table->integer('orders_id');
            $table->integer('qty');
            $table->integer('price');
            $table->string('id');
            $table->integer('buyers_id');
            $table->string('crop_name');
            $table->integer('crop_price');
            $table->string('crop_quantity');
            $table->string('crop_status');
            $table->string('orders_created_at');
            $table->string('orders_updated_at');
            $table->integer('user_id');
            $table->string('crop_image');
            $table->string('startHarvestMonth');
            $table->integer('startHarvestDay');
            $table->integer('startHarvestYear');
            $table->string('endHarvestMonth');
            $table->integer('endHarvestDay');
            $table->integer('endHarvestYear');
            $table->string('orders_buyer_name');
            $table->string('orders_address');
            $table->string('orders_mobile_no');
            $table->string('status');

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
        Schema::dropIfExists('individual_orders');
    }
}
