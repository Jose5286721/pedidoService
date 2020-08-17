<?php
namespace App\Http\Controllers;
use App\Estado;
use App\Events\PedidoConfirmado;
use App\Events\PedidoCreado;
use App\Events\PedidoDelivery;
use App\Events\PedidoUpdated;
use App\Http\Resources\Json\PedidoJson;
use App\Pedido;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Mail\PedidoNuevo;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class PedidoController extends Controller {
	use ApiResponse;
	public function index() {
		return $this->successResponse(Pedido::all());
	}
	public function indexEstados() {
		/*$nombres = array("En preparacion", "Listo para enviar", "Entregado");
			for ($cont = 1; $cont < 4; $cont++) {
				$estado = Estado::find($cont);
				$estado->nombre = $nombres[$cont - 1];
				$estado->save();
		*/
		return $this->successResponse(Estado::all());
	}
	public function showByEmpresaId($idEmpresa){
		$pedidos = Pedido::where("empresa_id",$idEmpresa)->where("confirmado","1")->orderBy("estado_id","asc")->get();
		return $this->successResponse($pedidos);
	}
	public function show($id) {
		$pedido = Pedido::findOrFail($id);
		return $this->successResponse(new PedidoJson($pedido));
	}
	public function store(Request $request) {
		$this->validate($request, [
			"usuario_id" => "required|min:1",
			"monto_total" => "required|min:1",
			"empresa_id" => "required|min:1",
			"ubicacion_inicial" => "required|string|min:1",
			"ubicacion_destino" => "required|string|min:1",
			"cantidad_items" => "required|string|min:1"
		]);
		$data = $request->all();
		$data["ubicacion_inicial"] = collect($data["ubicacion_inicial"]);
		$data["ubicacion_destino"] = collect($data["ubicacion_destino"]);
		$pedido = Pedido::create($data);
		event(new PedidoCreado($pedido));
		return $this->successResponse($pedido);
	}
	//Confirmamos el pedido
	public function confirmarPedido($id) {
		$pedido = Pedido::findOrFail($id);
		$pedido->confirmado = true;
		$pedido->estado_id = 1;
		$pedido->save();
		event(new PedidoConfirmado($pedido));
		return $this->successResponse($pedido);
	}
	//Aqui actualizamos el estado del pedido
	public function updateStatePedido($id, $idEstado) {
		$pedido = Pedido::findOrFail($id);
		$pedido->estado_id = $idEstado;
		$pedido->save();
		event(new PedidoUpdated($pedido));
		return $this->successResponse($pedido);
	}

	public function update(Request $request, $id) {
		$this->validate($request, [
			"cliente_id" => "min:1",
			"total_pedido" => "string|min:1",
			"estado_id" => "string|min:1",
			"ubicacion_inicial" => "string|min:1",
			"ubicacion_destino" => "string|min:1",
			"cantidad_items" => "string|min:1"
		]);
		$pedido = Pedido::findOrFail($id);
		$pedido->fill($request->all());
		if ($pedido->isClean()) {
			return $this->errorResponse("Modifique al menos un valor", Response::HTTP_UNPROCESSABLE_ENTITY);
		}
		$pedido->save();
		return $this->successResponse($pedido);
	}

	//Aqui la cantidad de pedidos que no fueron confirmados
	public function countPedidosSinConfirmar($id) {
		$pedidosCountSinConfirmar = Pedido::where("confirmado", false)->where("empresa_id", $id)->get()->count();
		return response()->json([
			"data" => $pedidosCountSinConfirmar,
		]);
	}

	//Aqui listamos los pedidos sin confirmar
	public function pedidosSinConfirmar($id) {
		$pedidos = Pedido::where("confirmado", false)->where("empresa_id", $id)->get();
		return $this->successResponse($pedidos);
	}
	//Aqui actualiza la ubicacion del delivery
	public function updatePedidoDelivery(Request $request, $id) {
		$this->validate($request, [
			"latitud" => "required|min:1",
			"longitud" => "required|min:1",
		]);
		$parametros = $request->all();
		event(new PedidoDelivery($id, $parametros));
	}
}
