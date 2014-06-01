<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nome');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('remember_token')
						->nullable()
						->default(null);
			$table->boolean('active')->DEFAULT(FALSE);
			$table->timestamps();
		});

		Schema::table('listas', function($table){
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('listas', function($table){
			$table->dropForeign('user_id');
			$table->dropColumn('user_id');
		});

		Schema::dropIfExists('users');
	}

}
