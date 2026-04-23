<?php

namespace yangpimpollo\L3_infrastructure\Controllers;

use yangpimpollo\L2_application\UseCases\HelloWorld;

class HelloWorldController
{
    public function __construct(private readonly HelloWorld $useCase) {}

    /**
     * pagina de HelloWorld
     */
    public function __invoke()
    {
        return $this->useCase->execute();
    }
}