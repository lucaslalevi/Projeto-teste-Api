<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceOrder;

class ServiceOrderController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'vehiclePlate' => 'required|string|max:10',
            'entryDateTime' => 'required|date',
            'exitDateTime' => 'nullable|date',
            'priceType' => 'required|string',
            'price' => 'required|numeric|min:0',
            'userId' => 'required|integer|exists:users,id', // Confirma que o userId existe na tabela 'users'
        ]);
    
        // Criação da nova ordem de serviço
        $serviceOrder = ServiceOrder::create($request->all());
    
        // Retorno em JSON com status 201 (Created)
        return response()->json($serviceOrder, 201);
    }

    // Método para listar pedidos
    public function index()
    {
        $serviceOrders = ServiceOrder::all(['vehiclePlate', 'entryDateTime', 'exitDateTime', 'priceType', 'price', 'userId']);
        return response()->json($serviceOrders, 200);
    }

    // Método para recuperar pedidos (novo método)
    public function show(Request $request)
    {
        $request->validate([
            'userId' => 'required|integer',
        ]);

        $serviceOrders = ServiceOrder::where('userId', $request->userId)->get();

        return response()->json($serviceOrders);
    }
}

?>