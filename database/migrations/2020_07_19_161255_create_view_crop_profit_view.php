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
            posts.id AS id,
            posts.crop_name AS crop_name,
            posts.crop_price AS crop_price,
            posts.crop_desc AS crop_desc,
            posts.crop_quantity AS crop_quantity,
            posts.crop_status AS crop_status,
            posts.created_at AS created_at,
            posts.updated_at AS updated_at,
            posts.user_id AS user_id,
            posts.crop_image AS crop_image,
            SUM(posts.kilogram_sold) AS kilogram_sold,
            SUM(posts.fixed_quantity) AS fixed_quantity,
            SUM(posts.earnings) AS earnings,
            SUM(posts.percentage_sold_before_harvest) AS percentage_sold_before_harvest,
            SUM(posts.production_cost) AS production_cost,
            SUM(posts.crop_profitability) AS crop_profitability
        FROM
            posts
        GROUP BY posts.crop_name
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
