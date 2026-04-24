<?php

namespace yangpimpollo\L3_infrastructure\Persistence\Order;

use Illuminate\Support\Facades\DB;

class DeleteOrder
{
    public function execute(string $orderId): array
    {
        return DB::table('orders')
            ->where('id', $orderId)
            ->delete();
    }
}