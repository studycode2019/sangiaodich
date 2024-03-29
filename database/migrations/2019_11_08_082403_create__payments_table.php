<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('_payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('number');
			$table->string('name')->nullable();
			$table->bigInteger('amount')->unsigned();
			$table->integer('branch_id')->default(0);
			$table->string('content')->nullable();
			$table->string('note')->nullable();
			$table->integer('staff_id');
			$table->integer('client_id');
			$table->softDeletes();
			$table->timestamps();
			$table->integer('field_id')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('_payments');
	}

}
