<?php
namespace App\Events;
use App\Http\Resources\Json\PedidoJson;
use App\Pedido;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PedidoConfirmado extends Event implements ShouldBroadcast {
	public $pedido;
	public function __construct(Pedido $pedido) {
		$this->pedido = new PedidoJson($pedido);
	}
	public function broadcastOn() {
		return new Channel("pedido");
	}
}
