<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewBuyersCropView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
    CREATE VIEW view_buyers_crops AS
    SELECT
    earnings.farmer_id as user_id,
    earnings.crop_id,
    COUNT( DISTINCT earnings.buyer_id::integer) AS buyers_per_crop
    FROM earnings
    GROUP BY earnings.crop_id, earnings.farmer_id
    ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
