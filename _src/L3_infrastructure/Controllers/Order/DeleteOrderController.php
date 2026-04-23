<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Order;

use Illuminate\Http\Request;
use yangpimpollo\L3_application\UseCases\Order\DeleteOrderUseCase;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;

class DeleteOrderController
{
    use ApiResponse;

    public function __construct( private DeleteOrderUseCase $indexOrderUseCase ) {}

    public function __invoke(Request $request)
    {
        $orderId = $request->route('orderId');
        $this->indexOrderUseCase->execute($orderId);
    }
}