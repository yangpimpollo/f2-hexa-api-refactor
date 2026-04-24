<?php

namespace yangpimpollo\L1_domain\Exceptions;

use Exception;

class my_order_Exception extends Exception
{
    public static function empty_customer_dni(): self
    {
        return new self("🙄 Falta el DNI del cliente que realiza la compra.");
    }

    public static function empty_items(): self
    {
        return new self("🙄 Faltan los items de la compra.");
    }

    public static function empty_product_id(): self
    {
        return new self("🙄 Falta el ID de producto.");
    }

    public static function numeric_field(): self
    {
        return new self("🙄 La cantidad y descuento deben ser numéricos.");
    }

    public static function invalid_quantity(int $quantity): self
    {
        return new self("🙄 La cantidad '$quantity' no es válida. Debe estar entre 1 y 50.");
    }

    public static function invalid_discount(): self
    {
        return new self("🙄 El descuento no es válido. Debe estar entre 0 y 1.");
    }

    public static function insufficient_stock(string $productId, string $productName, int $stock): self
    {
        return new self("🙄 el producto ' $productId ': ' $productName ' solo tiene ' $stock ' unidades en stock.");
    }
}
