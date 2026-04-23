<?php

namespace yangpimpollo\L3_infrastructure\Persistence\Product;

use Illuminate\Support\Facades\DB;
use yangpimpollo\L1_domain\Repository\ProductRepositoryInterface;

class EloquentSearchProduct implements ProductRepositoryInterface
{
    public function index(string $query, string $storeId): array
    {
        $sql = "SELECT p.product_id, p.product_name, p.product_price, i.quantity as stock
                FROM products p
                JOIN inventories i ON p.product_id = i.product_id
                WHERE i.store_id = :storeId 
                AND p.product_name ILIKE :query
                ORDER BY p.product_name ASC 
                LIMIT 20";

        $bindings = [
            'storeId' => $storeId,
            'query'   => "%{$query}%",
        ];

        return DB::select($sql, $bindings);
    }

}