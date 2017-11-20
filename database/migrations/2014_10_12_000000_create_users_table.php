<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->rememberToken();
			$table->timestamps();
		});
		// Schema::create('tbl_users', function (Blueprint $table) {
		//     $table->increments('user_id');
		//     $table->string('user_email')->unique();
		//     $table->string('user_password');
		//     $table->integer('role_id');
		//     $table->string('user_fullname');
		//     $table->string('user_image');
		//     $table->date('birthday')->nullable();
		//     $table->string('sex')->nullable();
		//     $table->string('address')->nullable();
		//     $table->integer('phone')->nullable();
		//     $table->integer('user_status');
		//     $table->rememberToken();
		//     $table->timestamps();
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
