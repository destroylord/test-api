<?php


namespace App\Helpers;

class TransaksiTransfer 
{
    public static function generateTransactionId()
    {
        $date = now()->format('ymd');
        $counter = str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
        return 'TF' . $date . $counter;
    }

    public static function generateUniqueCode()
    {
        return str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
    }

}