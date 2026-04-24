<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Order;

use Illuminate\Support\Facades\DB;



class StoreOrder
{
    public function execute(Order $order): array
    {
        DB::insert(
            "INSERT INTO orders (order_id, customer_dni, store_id, staff_id, total_amount, order_date) 
                VALUES (:order, :dni, :store, :staff, :total, :fecha)",
            [
                'order' => $order->getOrderId(),
                'dni'   => $order->getCustomerDni(),
                'store' => $order->getStoreId(),
                'staff' => $order->getStaffId(),
                'total' => $order->getTotalAmount(),
                'fecha' => $order->getOrderDate()->format('Y-m-d H:i:s')
            ]
        );

        foreach ($order->getItems() as $item) {
            DB::insert(
                "INSERT INTO order_items (order_id, product_id, quantity, list_price, discount) 
                    VALUES (:order, :product, :quantity, :price, :discount)",
                [
                    'order'     => $order->getOrderId(),
                    'product'   => $item->getProductId(),
                    'quantity'  => $item->getQuantity(),
                    'price'     => $item->getListPrice(),
                    'discount'  => $item->getDiscount()
                ]
            );

            DB::update(
                "UPDATE inventories SET quantity = quantity - :quantity 
                 WHERE store_id = :store AND product_id = :product AND quantity >= ?",
                [
                    'quantity' => $item->getQuantity(),
                    'product'  => $item->getProductId()
                ]
            );
        }


    }



}