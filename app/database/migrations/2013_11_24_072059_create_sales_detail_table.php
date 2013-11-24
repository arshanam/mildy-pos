<?php

use Illuminate\Database\Migrations\Migration;

class CreateSalesDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_details', function($table) {
			$table->increments('id');
			$table->integer('sales_id');
			$table->integer('product_id');
			$table->integer('quantity');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sales_details')
	}

}