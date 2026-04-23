<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Customer;

use Illuminate\Http\Request;

use yangpimpollo\L2_application\DTOs\CustomerDto;
use yangpimpollo\L2_application\UseCases\Customer\StoreCustomerUseCase;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;



class StoreCustomerController{
    use ApiResponse;
    public function __construct( private StoreCustomerUseCase $storeCustomerUseCase ) {}

    /**
     * Guardar Cliente
     */
    public function __invoke(Request $request){

        // 1° validación que sea requerido
        $validated = $request->validate([
            'dni'       => 'required|string',
            'firstname' => 'required|string',
            'lastname'  => 'required|string',
            'phone'     => 'required|string',
        ]);

        $dto = new CustomerDto(...$validated);

        $data = $this->storeCustomerUseCase->execute($dto);

        return $this->success($data, '¡Cliente guardado correctamente! 🏎️', 201);
    }
}