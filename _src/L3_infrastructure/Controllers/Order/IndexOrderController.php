<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Order;

use Illuminate\Http\Request;
use yangpimpollo\L2_application\UseCases\Order\IndexOrderUseCase;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;

class IndexOrderController
{
    use ApiResponse;

    // public function __construct( private IndexOrderUseCase $indexOrderUseCase ) {}

    public function __invoke(Request $request)
    {


        $data = null;
        return $this->success($data, 'index order controller! 🏎️', 200);
    }
}