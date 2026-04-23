<?php

namespace yangpimpollo\L3_infrastructure\Persistence\Customer;

use Illuminate\Support\Facades\DB;

use yangpimpollo\L1_domain\Entity\Customer;

class StoreCustomer {

    public function execute(Customer $customer): array{

        // en el caso de uso ya se verifico si el cliente ya existia
        DB::insert(
            "INSERT INTO customers (dni, firstname, lastname, phone, created_at) 
            VALUES (:dni, :firstname, :lastname, :phone, :created_at)",
            [
                'dni'        => $customer->getDni(),
                'firstname'  => $customer->getFirstname(),
                'lastname'   => $customer->getLastname(),
                'phone'      => $customer->getPhone(),
                'created_at' => $customer->getCreatedAt()->format('Y-m-d H:i:s'),
            ]
        );

        return $customer->toArray(); 
    }

}