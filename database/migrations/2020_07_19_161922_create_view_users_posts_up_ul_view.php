<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewUsersPostsUpUlView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
    CREATE VIEW view_users_posts_up_ul AS
        SELECT
            users.id AS id,
            posts.id AS post_id,
            users.first_name AS first_name,
            users.middle_name AS middle_name,
            users.last_name AS last_name,
            users.mobile_no AS mobile_no,
            user_lands.name_of_company AS name_of_company,
            user_lands.land_id AS land_id,
            user_lands.land_image AS land_image,
            user_lands.land_address AS land_address,
            user_lands.land_area AS land_area,
            user_lands.land_elevation AS land_elevation,
            posts.crop_image AS crop_image,
            posts.crop_name AS crop_name,
            posts.crop_price AS crop_price,
            posts.crop_quantity AS crop_quantity,
            posts.crop_status AS crop_status
        FROM
            users

        LEFT JOIN
            user_lands ON users.id = user_lands.user_id

        LEFT JOIN
            posts ON users.id = posts.user_id
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
