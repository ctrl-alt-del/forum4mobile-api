<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Concerns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('concerns', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('topic_id')->unsigned();
			$table->timestamps();

        	/* Do NOT do ->onDelete('cascade') in here because we want
        	to keep the concerns that a person added even if he deletes
        	his account */
        	$table->foreign('user_id')->references('id')->on('users');
        	$table->foreign('topic_id')->references('id')->on('topics');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('concerns');
	}
}