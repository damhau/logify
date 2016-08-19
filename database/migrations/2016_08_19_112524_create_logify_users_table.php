<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogifyUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logify_users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('Username');
			$table->string('Password');
			$table->string('Roles');
			$table->timestamps();
			$table->softDeletes();
			$table->string('logify_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('logify_users');
	}

}
