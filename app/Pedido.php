<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {
	protected $fillable = [
		"usuario_id", "monto_total", "estado_id","cantidad_items", "empresa_id","ubicacion_inicial","ubicacion_destino"
	];
	public function estado() {
		return $this->belongsTo("App\Estado");
	}
	protected $casts = [
		"ubicacion_inicial" => "array",
		"ubicacion_destino" => "array"
	];
}
