<?php

namespace yangpimpollo\L3_infrastructure\Persistence\Order;

use Illuminate\Support\Facades\DB;

class ShowOrder
{
    public function execute(string $orderId): array
    {
        return DB::table('orders')
            ->where('id', $orderId)
            ->first();
    }
}