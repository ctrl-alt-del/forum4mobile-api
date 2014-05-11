<?php

use Illuminate\Database\Schema\Blueprint;

class ReviewsTableSeeder extends Seeder {

    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Uncomment the below to wipe the table clean before populating
        DB::table('reviews')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $date = new DateTime;

        for ($i = 0; $i < 15; $i++) {
            $review = array(
                'user_id' => rand(1, 4), 
                'topic_id' => rand(1, 10),
                'content' => "some responses $i",
                'created_at' => $date,
                'updated_at' =>$date,
                );
            try {
                DB::table('reviews')->insert($review);
            } catch (Exception $e) {

            }
        }
    }
}
