<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
        Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
            $table->String('uuid', 23)->unique();
            $table->String('name', 50);
            $table->String('email', 100)->unique();
            $table->String('password', 80);
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
        Schema::drop('users');
	}
}