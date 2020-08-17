<?php
namespace App\Events;
use App\Pedido;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PedidoCreado extends Event implements ShouldBroadcast {
	public $pedido;
	public function __construct(Pedido $pedido) {
		$this->pedido = $pedido;
	}
	public function broadcastOn() {
		return new Channel('pedido');
	}
}
