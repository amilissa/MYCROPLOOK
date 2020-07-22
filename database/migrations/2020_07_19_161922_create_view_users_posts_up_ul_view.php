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
            user_profile.first_name AS first_name,
            user_profile.middle_name AS middle_name,
            user_profile.last_name AS last_name,
            user_profile.user_image AS user_image,
            user_profile.mobile_no AS mobile_no,
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
            posts.crop_status AS crop_status,
            user_profile.user_id AS user_id
        FROM
            users
        LEFT JOIN
            user_profile ON users.id = user_profile.user_id

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
