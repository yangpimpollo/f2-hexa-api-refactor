<?php

namespace yangpimpollo\L2_application\DTOs;

use yangpimpollo\L1_domain\Exceptions\my_order_Exception;
class OrderDto
{
    public function __construct(
        public readonly ?string $customerDni,
        public readonly ?string $storeId,
        public readonly ?int $staffId,
        public readonly ?array $items
    ) {

        if (empty($this->customerDni))
            throw my_order_Exception::empty_customer_dni();
        
        if(empty($this->items))
            throw my_order_Exception::empty_items();

    }
}