<?php

namespace yangpimpollo\L1_domain\Exceptions;

use Exception;

class my_product_Exception extends Exception
{
    public static function empty_product(string $product_id): self
    {
        return new self("🙄 Producto de ID {$product_id} no encontrado! ...");
    }

}