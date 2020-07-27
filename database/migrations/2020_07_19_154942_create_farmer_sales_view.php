<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerSalesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW farmer_sales AS
        SELECT
            posts.user_id AS user_id,
            posts.crop_name AS crop_name,
            SUM(posts.fixed_quantity::decimal) AS totalfixedqty,
            SUM(posts.crop_quantity::decimal) AS totalavailableqty,
            SUM(posts.kilogram_sold::decimal) AS totalkgsold,
            AVG(ROUND(posts.percentage_sold_before_harvest::decimal,
                    1)) AS totalpercentage
        FROM
            posts
        GROUP BY posts.user_id , posts.crop_name
        ");
    }

    /**
     * Reverse the migrations.

     * @return void
     */
    public function down()
    {
    }
}
