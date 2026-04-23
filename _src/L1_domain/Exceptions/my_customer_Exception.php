<?php

namespace yangpimpollo\L1_domain\Exceptions;

use Exception;

class my_customer_Exception extends Exception
{
    public static function customer_already_exists(): self
    {
        return new self("¡Vaya! 🔍 Parece que este cliente ya a sido registrado");
    }

    public static function customer_not_found(): self
    {
        return new self("¡Vaya! 🔍 Parece que este cliente no existe");
    }

}