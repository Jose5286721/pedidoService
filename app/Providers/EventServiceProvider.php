<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {
	/**
	 * The event listener mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		\App\Events\ExampleEvent::class => [
			\App\Listeners\ExampleListener::class,
		],
		\App\Events\PedidoCreado::class => [
			\App\Listeners\PedidoCreadoListener::class,
		],
		\App\Events\PedidoConfirmado::class => [
			\App\Listeners\PedidoConfirmadoListener::class,
		],
		\App\Events\PedidoUpdated::class => [
			\App\Listeners\PedidoUpdatedListener::class,
		],
	];
}
