<?php

namespace yangpimpollo\L2_application\UseCases\Customer;

use yangpimpollo\L1_domain\Exceptions\my_customer_Exception;
use yangpimpollo\L1_domain\Repository\CustomerRepositoryInterface;
use yangpimpollo\L1_domain\Entity\Customer;
use yangpimpollo\L1_domain\ValueObjects\dni;
use yangpimpollo\L1_domain\ValueObjects\phone;
use yangpimpollo\L2_application\DTOs\CustomerDto;
use DateTimeImmutable;

class StoreCustomerUseCase
{
    public function __construct(
        private readonly CustomerRepositoryInterface $repository
    ) {}

    public function execute(CustomerDto $dto): array
    {
        if (!$dto->dni || !$dto->firstname || !$dto->lastname || !$dto->phone) 
            throw my_customer_Exception::empty_fields();

        if ($this->repository->show(new dni($dto->dni)))
            throw my_customer_Exception::customer_already_exists();
        

        $customer = new Customer(
            new dni($dto->dni),
            $dto->firstname,
            $dto->lastname,
            new phone($dto->phone),
            new DateTimeImmutable()
        );

        return $this->repository->store($customer);
    }
}