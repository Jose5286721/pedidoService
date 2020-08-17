<?php

namespace App\Listeners;

use App\Events\PedidoUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class PedidoUpdatedListener implements ShouldQueue{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PedidoUpdated  $pedido
     * @return void
     */
    public function handle(PedidoUpdated $pedido)
    {
        Log::info("El pedido con id {$pedido->id} ha sido actualizada");
    }
}
