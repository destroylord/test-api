<?php

namespace App\Services;

use App\Helpers\TransaksiTransfer;
use App\Models\TransaksiTransfer as ModelsTransaksiTransfer;
use App\Models\RekeningAdmin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransferService
{
    public function createTransfer(array $data)
    {
        // Cek rekening admin berdasarkan bank tujuan
        $rekeningAdmin = RekeningAdmin::whereHas('bank', function ($query) use ($data) {
            $query->where('code', $data['bank_tujuan']);
        })->first();

        if (!$rekeningAdmin) {
            return ['error' => 'Rekening tujuan tidak ditemukan', 'code' => 404];
        }

        // Buat transaksi
        $transaksi = ModelsTransaksiTransfer::create([
            'user_id' => Auth::id(),
            'rekening_admin_id' => $rekeningAdmin->id,
            'transaction_id' => TransaksiTransfer::generateTransactionId(),
            'amount' => $data['nilai_transfer'],
            'unique_code' => TransaksiTransfer::generateUniqueCode(),
        ]);

        $total_transfer = $transaksi->amount + $transaksi->unique_code;

        $transaksi->valid_until = Carbon::now()->addDays(3);

        return [
            'id_transaksi' => $transaksi->transaction_id,
            'nilai_transfer' => $transaksi->amount,
            'kode_unik' => $transaksi->unique_code,
            'biaya_admin' => 0,
            'total_transfer' => $total_transfer,
            'bank_perantara' => $rekeningAdmin->bank->name,
            'rekening_perantara' => $rekeningAdmin->account_number,
            'berlaku_hingga' => $transaksi->valid_until->toIso8601String(),
        ];
    }
}