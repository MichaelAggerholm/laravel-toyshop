<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart
{
    // Ikke i brug på min, da jeg ikke omregner fra cents
//    public function centsToPrice($cents) {
//        return number_format($cents / 100, 2);
//    }

    public static function unitPrice($item) {
        return $item['product']['price'] * $item['quantity'];
    }

    public static function totalAmount() {
        $total = 0;
        foreach (session('cart') as $item) {
            $total += self::unitPrice($item);
        }
        return $total;
    }
}
