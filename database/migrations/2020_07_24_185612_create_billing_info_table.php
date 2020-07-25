<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_info', function (Blueprint $table) {
            $table->bigIncrements('bil_id');
            $table->integer('user_id');
            $table->string('bil_address');
            $table->string('bil_brgy');
            $table->string('bil_city');
            $table->string('bil_province');
            $table->integer('bil_zipcode');
            $table->string('bil_country');
            $table->string('bil_others');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_info');
    }
}
