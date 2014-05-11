<?php

use Illuminate\Database\Schema\Blueprint;

class VotesTableSeeder extends Seeder {

    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Uncomment the below to wipe the table clean before populating
        DB::table('votes')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $date = new DateTime;

        for ($i = 0; $i < 10; $i++) {
            $vote = array(
                'user_id' => rand(1, 4), 
                'review_id' => rand(1, 10),
                'created_at' => $date,
                'updated_at' =>$date,
                );
            try {
                DB::table('votes')->insert($vote);
            } catch (Exception $e) {

            }
        }
    }
}
