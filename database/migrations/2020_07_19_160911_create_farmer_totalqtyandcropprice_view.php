<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerTotalqtyandcroppriceView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW farmer_totalqtyandcropprice AS
            SELECT
                posts.user_id AS user_id,
                SUM(posts.crop_quantity) AS sumcropqty,
                AVG(posts.crop_price) AS avgcropprice,
                posts.crop_name AS crop_name
                posts.created_at
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
