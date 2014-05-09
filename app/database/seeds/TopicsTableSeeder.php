<?php

use Illuminate\Database\Schema\Blueprint;

class TopicsTableSeeder extends Seeder {

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Uncomment the below to wipe the table clean before populating
        DB::table('topics')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        $date = new DateTime;


        $topics = array();

        for ($i = 0; $i < 10; $i++) {
            $topic = array(
                'title' => "title $i", 
                'description' => "description $i",
                'content' => "content $i",
                'user_id' => rand(1, 4),
                'created_at' => $date,
                'updated_at' =>$date,
                );
            array_push($topics, $topic);
        }
        




        // Uncomment the below to run the seeder
        DB::table('topics')->insert($topics);
    }
}
