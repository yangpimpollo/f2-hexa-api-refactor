<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Order;

use Illuminate\Support\Facades\DB;


class IndexOrder {
    public function excecute(string $storeId) {
        $limit = 15;
        $page = request()->get('page', 1);
        $offset = ($page - 1) * $limit;

        return DB::select(
            "SELECT * FROM orders WHERE store_id = ? ORDER BY order_date DESC LIMIT ? OFFSET ?",
            [$storeId, $limit, $offset]
        );
    }
}

