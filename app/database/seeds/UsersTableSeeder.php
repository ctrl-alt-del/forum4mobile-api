<?php

use Illuminate\Database\Schema\Blueprint;

class UsersTableSeeder extends Seeder {

    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->truncate();

        $users = array();

        $date = new DateTime;
        
        $numberOfSample = pow(2,2);

        $password = Hash::make('000000');
        $skip_users = 0;
        for ($i = 1; $i <= $numberOfSample; $i++) {

            if ($i % 50 == 0) {
                try {
                    DB::table('users')->insert($users);
                } catch (Exception $e) {
                    $skip_users++;
                }
                unset($users);
                $users = array();
            }

            $name = $this->genUsername();
            $email = $this->genEmail($name);

            $user = array(
                'uuid' => uniqid("", true),
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'created_at' => $date,
                'updated_at' => $date
                );
            array_push($users, $user);
        }

        try {
            DB::table('users')->insert($users);
        } catch (Exception $e) {
            $skip_users++;
        }
        unset($users);
        $users = array();
        
        echo "planning $numberOfSample to create users...\n";
        echo "creating ".($numberOfSample - $skip_users)." users...\n";
        echo "skipping $skip_users users...\n";
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    public function genUsername() {
        $username = '';
        for ($i = 0; $i < 4; $i++) {
            $username .= chr(rand(97, 122));
        }
        return $username = $username . rand(0, 99);
    }

    public function genEmail($username) {
        switch (rand()&4) {
            case 1:
            $domain = '@gmail.com';
            break;
            case 3:
            $domain = '@hotmail.com';
            break;
            case 4:
            $domain = '@yahoo.com';
            break;
            default:
            $domain = '@gmail.com';
            break;
        }
        return "{$username}{$domain}";
    }
}