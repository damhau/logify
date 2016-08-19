<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProvisionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('provisions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('es_cluster', 65535);
			$table->text('logify_name', 65535);
			$table->text('VIP', 65535);
			$table->text('ip_public', 65535);
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
		Schema::drop('provisions');
	}

}
