<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartTotalquantityandcroppriceView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW chart_totalquantityandcropprice
        AS
        SELECT
        posts.crop_name AS crop_name,
        SUM(posts.crop_quantity::decimal) AS sumcropqty,
        (SUM(posts.crop_quantity::decimal) * posts.crop_price::decimal) AS allcropprice,
        AVG(posts.crop_price::decimal) AS avgcropprice
        FROM
        posts
        GROUP BY posts.crop_name, posts.crop_price
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
