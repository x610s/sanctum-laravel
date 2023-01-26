<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransferenciaRequest;
use App\Http\Requests\UpdateTransferenciaRequest;
use App\Services\TransferenciasService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TransferenciaController extends Controller
{   

    protected $trasferenciasService;
    public function __construct(TransferenciasService $trasferenciasService)
    {
        $this->trasferenciasService = $trasferenciasService;
    }


    public function index()
    {
        try {
            return response()->json($this->trasferenciasService->getAllTransferencias(), 200);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ]);
        }
    }

    public function add(StoreTransferenciaRequest $request)
    {
        try {
            $creado = $this->trasferenciasService->storeTranrerencia($request);
            if ($creado) {
                return response()->json(['data'=>'Transferencia creada exitosamente'], 200);
            }
            return response()->json('Error al crear ransferencia', 400);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 400);
        }
    }

    public function update(UpdateTransferenciaRequest $transferencia)
    {
        try {
            $creado = $this->trasferenciasService->updateTransferencia($transferencia);
            if ($creado) {
               return response()->json(['data'=>'Transferencia modificada exitosamente'], 200); 
            }
            return response()->json(['Error al crear transferencia'], 400);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'data' => 'Transferencia no encontrada'
            ], 404);
        } catch (\Throwable $th) {
            return response()->json([
                'data' => $th
            ], 400);
        }
    }


    public function destroy(Request $request)
    {
        try {
            if($request->id == NULL){
                return response()->json([
                    'error' => 'No se ha enviando el parametro correcto'
                ], 400);
            }
            $borrado = $this->trasferenciasService->deleteTransfer($request->id);
            if ($borrado) {
                return response()->json(['Transferencia eliminada exitosamente'], 200);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Transferencia no encontrada'
            ], 404);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th
            ], 400);
        }
    }
}
