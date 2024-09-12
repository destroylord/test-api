<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiTransfer extends Model
{
    use HasFactory;

    protected $table = 'transaksi_transfers';
    protected $fillable = [
        'user_id', 'rekening_admin_id', 'transaction_id', 'amount', 'unique_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rekeningAdmin()
    {
        return $this->belongsTo(RekeningAdmin::class);
    }
}
