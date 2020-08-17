<?php
namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PedidoDelivery extends Events implements ShouldBroadcast {
	public $id;
	public $coordenadas;
	public function __construct($id, $coordenadas) {
		$this->id = $id;
		$this->coordenadas = $coordenadas;
	}
	public function broadcastOn() {
		return new Channel('pedido');
	}
}
