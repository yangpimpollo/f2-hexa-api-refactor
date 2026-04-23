<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Customer;


use yangpimpollo\L2_application\UseCases\Customer\ShowCustomerUseCase;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;



class ShowCustomerController{
    use ApiResponse;
    public function __construct( private ShowCustomerUseCase $ShowCustomerUseCase ) {}

    public function __invoke(string $dniValue){
        return $this->ShowCustomerUseCase->execute($dniValue);
    }
}