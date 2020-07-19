<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewBuyersCropsView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW `view_buyers_crops` AS
        SELECT 
            `earnings`.`farmer_id` AS `user_id`,
            `earnings`.`crop_id` AS `crop_id`,
            COUNT(DISTINCT `earnings`.`buyer_id`) AS `buyers_per_crop`
        FROM
            `earnings`
        GROUP BY `earnings`.`crop_id`
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
