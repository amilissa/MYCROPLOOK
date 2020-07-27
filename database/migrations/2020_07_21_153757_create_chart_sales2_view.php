<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartSales2View extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
    CREATE VIEW chart_sales2 AS
    SELECT
        posts.crop_name AS crop_name,
        SUM(posts.fixed_quantity::decimal) AS totalfixedqty,
        SUM(posts.crop_quantity::decimal) AS totalavailableqty,
        SUM(posts.kilogram_sold::decimal) AS totalkgsold,
        AVG(ROUND(posts.percentage_sold_before_harvest::decimal,
                1)) AS totalpercentage
    FROM
        posts
    GROUP BY posts.crop_name, posts.created_at
    ORDER BY totalavailableqty DESC
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
