<?php

namespace yangpimpollo\L2_application\UseCases\Auth;

use yangpimpollo\L1_domain\Exceptions\my_login_error_Exception;

use yangpimpollo\L1_domain\Repository\AuthRepositoryInterface;
use yangpimpollo\L2_application\DTOs\LoginDto;


class LoginUseCase {

    public function __construct(
        private AuthRepositoryInterface $repository
    ) {}

    public function execute(LoginDto $dto)
    {
        $value = $this->repository->login($dto->username, $dto->password);

        if ($value == "code - null") throw my_login_error_Exception::user_not_found();
        if ($value == "code - incorrect") throw my_login_error_Exception::incorrect_password();

        return $value;
    }
}