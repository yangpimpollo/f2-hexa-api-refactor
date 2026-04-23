<?php

namespace yangpimpollo\L2_application\UseCases\Customer;

use yangpimpollo\L1_domain\Exceptions\my_customer_Exception;
use yangpimpollo\L1_domain\Repository\CustomerRepositoryInterface;
use yangpimpollo\L1_domain\ValueObjects\dni;
use yangpimpollo\L1_domain\Entity\Customer;

class ShowCustomerUseCase
{
    public function __construct(
        private readonly CustomerRepositoryInterface $repository
    ) {}

    public function execute(string $dniValue): ?Customer
    {
        $value = $this->repository->show(new dni($dniValue));

        if ($value == null) throw my_customer_Exception::customer_not_found();

        return $value;
    }
}