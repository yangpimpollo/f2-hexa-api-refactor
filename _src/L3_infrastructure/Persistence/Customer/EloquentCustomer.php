<?php

namespace yangpimpollo\L3_infrastructure\Persistence\Customer;


use yangpimpollo\L1_domain\Entity\Customer;
use yangpimpollo\L1_domain\Repository\CustomerRepositoryInterface;
use yangpimpollo\L1_domain\ValueObjects\dni;

class EloquentCustomer implements CustomerRepositoryInterface
{
    public function __construct(
        private ShowCustomer $showCustomer,
        private StoreCustomer $storeCustomer
    ) {}

    public function show(dni $dni): ?Customer
    {
        return $this->showCustomer->execute($dni);
    }

    public function store(Customer $customer): array
    {
        return $this->storeCustomer->execute($customer);
    }

    
}