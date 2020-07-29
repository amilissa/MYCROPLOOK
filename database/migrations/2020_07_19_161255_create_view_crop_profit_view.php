<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewCropProfitView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW view_crop_profit AS
        SELECT
            posts.crop_name AS crop_name,
            SUM(posts.kilogram_sold::decimal) AS kilogram_sold,
            SUM(posts.fixed_quantity::decimal) AS fixed_quantity,
            SUM(posts.earnings::decimal) AS earnings,
            SUM(posts.percentage_sold_before_harvest::decimal) AS percentage_sold_before_harvest,
            SUM(posts.production_cost::decimal) AS production_cost,
            SUM(posts.crop_profitability::decimal) AS crop_profitability
        FROM
            posts
        GROUP BY posts.crop_name, posts.crop_profitability
        ORDER BY posts.crop_profitability DESC
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
