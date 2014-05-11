<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Eloquent::unguard();
		$time_start = microtime(true);

		$this->call('UsersTableSeeder');
		$this->call('TopicsTableSeeder');
		$this->call('ConcernsTableSeeder');
		$this->call('ReviewsTableSeeder');
		$this->call('VotesTableSeeder');

		$time_end = microtime(true);
		$duration = $time_end - $time_start;
		echo "Populating database took: $duration seconds\n";
	}

}
