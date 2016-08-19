<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProbesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('probes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('Name');
			$table->string('Ip');
			$table->text('Input');
			$table->text('FIlter');
			$table->text('Output');
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
		Schema::drop('probes');
	}

}
