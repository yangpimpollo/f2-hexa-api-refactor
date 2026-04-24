<?php

namespace yangpimpollo\L1_domain\Exceptions;

use Exception;

class my_login_error_Exception extends Exception
{
    public static function empty_fields(): self
    {
        return new self("Detecto un vacío existencial en este formulario... 🕵️‍♂️🔍, rellena todo los campos");
    }
    public static function user_not_found(): self
    {
        return new self("¡Vaya! No pudimos encontrar a quien buscas. 🕵️‍♂️🔍 ¿Seguro que escribiste bien el nombre?");
    }

    public static function incorrect_password(): self
    {
        return new self("Esto es Terrible! La contraseña es incorrecta, intenta de nuevo.😉");
    }

    public static function logout_error(): self
    {
        return new self("No se cerro la sesion");
    }
}