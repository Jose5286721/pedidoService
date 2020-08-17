<?php
namespace App\Http\Resources\Json;
use Illuminate\Http\Resources\Json\JsonResource;

class PedidoJson extends JsonResource {
	public function toArray($request) {
		return [
			"id" => $this->id,
			"estado" => $this->estado->nombre,
			"empresa_id" => $this->empresa_id,
			"creado" => $this->created_at,
		];
	}
}
