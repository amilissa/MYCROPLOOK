<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('crop_name');
            $table->integer('crop_price');
            $table->text('crop_desc');
            $table->integer('crop_quantity');
            $table->string('crop_status');
            $table->string('crop_image');
            $table->integer('user_id');
            $table->double('kilogram_sold');
            $table->integer('fixed_quantity');
            $table->integer('production_cost');
            $table->integer('crop_profitability');
            $table->integer('earnings');
            $table->string('percentage_sold_before_harvest');
            $table->string('startHarvestMonth');
            $table->string('startHarvestDay');
            $table->string('startHarvestYear');
            $table->string('endHarvestMonth');
            $table->string('endHarvestDay');
            $table->string('endHarvestYear');
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
        Schema::dropIfExists('posts');
    }
}
