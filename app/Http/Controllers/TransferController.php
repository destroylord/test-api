<?php

namespace App\Http\Controllers;

use App\Services\TransferService;
use Illuminate\Http\Request;

class TransferController extends Controller
{

    protected $TransferService;
    public function __construct( TransferService $TransferService)
    {
        $this->TransferService = $TransferService;
    }

    public function transferBank(Request $request)
    {
        $validatedData = $request->validate([
            'nilai_transfer' => 'required|numeric|min:1000',
            'bank_tujuan' => 'required|string',
            'rekening_tujuan' => 'required|string',
            'atasnama_tujuan' => 'required|string',
            'bank_pengirim' => 'required|string',
        ]);

        $result =  $this->TransferService->createTransfer($validatedData);

        if (isset($result['error'])) {
            return response()->json(['message' => $result['error']], $result['code']);
        }

        return response()->json($result, 201);
    }
}
