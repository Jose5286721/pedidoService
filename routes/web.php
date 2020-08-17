<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$router->group(["prefix" => "api/pedidos","middleware" => "secret"], function () use ($router) {
	$router->get("", "PedidoController@index");
	$router->get("/{id}", "PedidoController@show");
	$router->get("/empresa/{idEmpresa}","PedidoController@showByEmpresaId");
	$router->post("", "PedidoController@store");
	$router->put("/{id}", "PedidoController@update");
	$router->put("/{id}/estado/{idEstado}", "PedidoController@updateStatePedido");
	$router->put("/{id}/confirmar", "PedidoController@confirmarPedido");
	$router->get("/empresa/{id}/nuevos/count", "PedidoController@countPedidosSinConfirmar");
	$router->get("/empresa/{id}/nuevos", "PedidoController@pedidosSinConfirmar");
});
