<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddListas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('listas', function($table){
			$table->increments('id');
			$table->string('titulo',100);
			$table->timestamps();
		});

		Schema::table('tarefas', function($table){
			$table->integer('lista_id')->unsigned()->nullable();
			$table->foreign('lista_id')->references('id')->on('listas')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tarefas', function(){
			$table->dropForeign('tarefa_id');
			$table->dropColumn('lista_id');
		});

		Schema::dropIfExists('listas');
	}

}
