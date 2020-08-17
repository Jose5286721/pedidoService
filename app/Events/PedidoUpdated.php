<?php
namespace App\Events;
use App\Pedido;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PedidoUpdated extends Event implements ShouldBroadcast {
	public $id;
	public $estado;
	public $pedido;

	public function __construct(Pedido $pedido) {
		$this->id = $pedido->id;
		$this->estado = $pedido->estado->nombre;
		$this->pedido = $pedido;
	}
	public function broadcastOn() {
		return new Channel('pedido');
	}
}
