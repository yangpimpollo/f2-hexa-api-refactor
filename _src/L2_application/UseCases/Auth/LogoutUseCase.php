<?php

namespace yangpimpollo\L2_application\UseCases\Auth;

use yangpimpollo\L1_domain\Exceptions\my_login_error_Exception;
use yangpimpollo\L1_domain\Repository\AuthRepositoryInterface;

class LogoutUseCase {
    public function __construct(
        private AuthRepositoryInterface $repository
    ) {}

    public function execute()
    {
        $value = $this->repository->logout();

        if($value) return "Sesión finalizada ¡Vuelve pronto! 👋";

        throw my_login_error_Exception::logout_error();
    }
}