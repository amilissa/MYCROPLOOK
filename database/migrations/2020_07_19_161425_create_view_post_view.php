<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewPostView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW view_post AS
    SELECT
        posts.id AS posts_id,
        posts.crop_name AS crop_name,
        posts.crop_image AS crop_image,
        posts.crop_price AS crop_price,
        posts.crop_quantity AS crop_quantity,
        users.id AS id,
        posts.crop_status AS crop_status,
        posts.startHarvestMonth,
        posts.startHarvestYear
    FROM
        (posts
        JOIN users ON ((posts.user_id = users.id)))
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
