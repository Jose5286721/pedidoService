<?php

namespace App\Listeners;

use App\Events\PedidoCreado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\PedidoNuevo;

class PedidoCreadoListener implements ShouldQueue {

	use InteractsWithQueue;
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */

	public function __construct() {
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  \App\Events\ExampleEvent  $event
	 * @return void
	 */
	public function handle(PedidoCreado $event) {
		Mail::to("joseascurra123@gmail.com")->send(new PedidoNuevo());
		Log::info("Nuevo pedido con id {$event->pedido->id}");
	}
}
