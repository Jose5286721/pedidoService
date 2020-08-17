<?php
namespace App\Listeners;
use App\Events\PedidoConfirmado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class PedidoConfirmadoListener implements ShouldQueue {
	use InteractsWithQueue;
	public function __construct() {

	}
	public function handle(PedidoConfirmado $pedido) {
		Log::info("Pedido confirmado con id: {$pedido->pedido->id}");
	}
}
