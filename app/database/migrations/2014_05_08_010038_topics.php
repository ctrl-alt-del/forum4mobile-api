<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Topics extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('topics', function(Blueprint $table) {
            $table->increments('id');
            $table->String('title', 50);
            $table->String('description', 100)->unique();
            $table->String('content', 80);
            $table->integer('user_id')->default(0)->unsigned();
            $table->timestamps();

            /* Do NOT do ->onDelete('cascade') in here because we want
                to keep the topics that a person added even if he deletes
                his account */
            $table->foreign('user_id')->references('id')->on('users');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('topics');
	}
}