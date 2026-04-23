<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Order;

use Illuminate\Http\Request;
use yangpimpollo\L2_application\UseCases\Order\StoreOrderUseCase;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class StoreOrderController
{
    use ApiResponse;

    public function __construct( private StoreOrderUseCase $storeOrderUseCase )
    {}

    public function __invoke(Request $request)
    {
        $order = $this->storeOrderUseCase->execute($request->all());
        return $this->successResponse($order);
    }
}