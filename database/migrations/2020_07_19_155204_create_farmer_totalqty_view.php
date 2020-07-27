<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerTotalqtyView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW farmer_totalqty AS
        SELECT
            posts.user_id AS user_id,
            SUM(posts.crop_quantity::decimal) AS sumcropqty,
            (SUM(posts.crop_quantity::decimal) * posts.crop_price::decimal) AS allcropprice,
            AVG(posts.crop_price::decimal) AS avgcropprice,
            posts.crop_name AS crop_name
        FROM
            posts
        GROUP BY posts.user_id , posts.crop_name, posts.crop_price
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
