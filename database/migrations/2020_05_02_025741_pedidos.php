<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pedidos extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('pedidos', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger("usuario_id");
			$table->unsignedBigInteger("estado_id")->nullable();
			$table->boolean("confirmado")->default(false);
			$table->integer("monto_total");
			$table->point("ubicacion_inicial");
			$table->point("ubicacion_destino");
			$table->integer("cantidad_items");
			$table->unsignedBigInteger("empresa_id");
			$table->timestamps();
			$table->foreign('estado_id')->references('id')->on('estados');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('pedidos');
	}
}
