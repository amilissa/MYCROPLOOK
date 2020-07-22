<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartSalesView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        \DB::statement("
        CREATE VIEW chart_sales AS
        SELECT
            posts.crop_name AS crop_name,
            SUM(posts.fixed_quantity) AS totalfixedqty,
            SUM(posts.crop_quantity) AS totalavailableqty,
            SUM(posts.kilogram_sold) AS totalkgsold,
            AVG(ROUND(posts.percentage_sold_before_harvest,
                    1)) AS totalpercentage,
            created_at
        FROM
            posts
        GROUP BY posts.crop_name
        ORDER BY totalkgsold DESC
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
