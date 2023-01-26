<?php

namespace App\Services;

use App\Http\Requests\StoreTransferenciaRequest;
use App\Http\Requests\UpdateTransferenciaRequest;
use App\Models\Transferencia;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransferenciasService
{

    public function getAllTransferencias()
    {
        return Transferencia::with(array('user' => function ($query) {
            $query->select('id', 'name');
        }))->get();
    }

    public function storeTranrerencia(StoreTransferenciaRequest $request)
    {
        return Transferencia::create($request->all())->save();
    }

    public function updateTransferencia(UpdateTransferenciaRequest $request)
    {
        $transfer =  Transferencia::findOrFail($request->id);
        $transfer->fill($request->except('id'));
        return $transfer->save();
    }

    public function deleteTransfer($id)
    {
        return Transferencia::findOrFail($id)->delete();
    }
}
