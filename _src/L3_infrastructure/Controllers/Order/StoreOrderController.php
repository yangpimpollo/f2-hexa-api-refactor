<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Order;

use Illuminate\Http\Request;


use yangpimpollo\L2_application\DTOs\OrderDto;
use yangpimpollo\L2_application\DTOs\OrderItemDto;
use yangpimpollo\L2_application\UseCases\Order\StoreOrderUseCase;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class StoreOrderController
{
    use ApiResponse;

    public function __construct( private StoreOrderUseCase $storeOrderUseCase ){}

    public function __invoke(Request $request)
    {
        // $request->validate([
        //     'customer_dni' => 'required|string',
        //     'items' => 'required|array|min:1',
        //     'items.*.product_id' => 'required|string',
        //     'items.*.quantity' => 'required|integer|min:1',
        //     'items.*.discount' => 'nullable|numeric|min:0',
        // ]);


        $itemsDto = array_map(fn($item) => new OrderItemDto(
            $item['product_id'],
            $item['quantity'],
            ($item['discount'])
        ), $request->input('items'));

        $dto = new OrderDto(
            $request->input('customer_dni'),
            $request->user()->store_id,
            $request->user()->id,
            $itemsDto
        );

        //$data = $this->storeOrderUseCase->execute($dto);
        $data=null;
        return $this->success($data, 'orden registrada! 🏎️', 201);
    }
}