<?php

namespace yangpimpollo\L3_infrastructure\Persistence\Customer;

use Illuminate\Support\Facades\DB;

use yangpimpollo\L1_domain\Entity\Customer;
use yangpimpollo\L1_domain\ValueObjects\dni;
use yangpimpollo\L1_domain\ValueObjects\phone;
use DateTimeImmutable;

class ShowCustomer {
    public function execute(dni $dni): ?Customer{

        $sql = "SELECT dni, firstname, lastname, phone, created_at FROM customers WHERE dni = ?";
        $bindings = [$dni->value()];

        $row = DB::selectOne($sql,$bindings);

        if (!$row) return null;

        return new Customer(
            new dni($row->dni),
            $row->firstname,
            $row->lastname,
            new phone($row->phone),
            new DateTimeImmutable($row->created_at)
        );
    }
}