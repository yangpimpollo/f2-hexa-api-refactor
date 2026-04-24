<?php

namespace yangpimpollo\L2_application\DTOs;

use yangpimpollo\L1_domain\Exceptions\my_order_Exception;

class OrderItemDto
{
    public function __construct(
        public readonly ?string $productId,
        public readonly ?int $quantity = 1,
        public readonly float $discount = 0
    ) {

        if (empty($this->productId))
            throw my_order_Exception::empty_product_id();

        if(!is_numeric($this->quantity) || !is_numeric($this->discount))
            throw my_order_Exception::numeric_field();

        if ($this->quantity < 1 || $this->quantity > 50) {
            throw my_order_Exception::invalid_quantity($this->quantity);
        }

        if ($this->discount < 0 || $this->discount > 1) {
            throw my_order_Exception::invalid_discount();
        }

    }
}