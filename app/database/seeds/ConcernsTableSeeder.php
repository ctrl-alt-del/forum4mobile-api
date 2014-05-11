
<?php

use Illuminate\Database\Schema\Blueprint;

class ConcernsTableSeeder extends Seeder {

    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Uncomment the below to wipe the table clean before populating
        DB::table('concerns')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $date = new DateTime;

        for ($i = 0; $i < 20; $i++) {
            $concern = array(
                'user_id' => rand(1, 4), 
                'topic_id' => rand(1, 10),
                'created_at' => $date,
                'updated_at' =>$date,
                );
            try {
                DB::table('concerns')->insert($concern);
            } catch (Exception $e) {

            }
        }
    }
}
