<?php

namespace yangpimpollo\L2_application\UseCases\Order;

use yangpimpollo\L1_domain\Entity\Order;
use yangpimpollo\L1_domain\Entity\OrderItem;
use yangpimpollo\L1_domain\Exceptions\my_product_Exception;
use yangpimpollo\L1_domain\Repository\OrderRepositoryInterface;
use yangpimpollo\L1_domain\Repository\ProductRepositoryInterface;
use yangpimpollo\L1_domain\ValueObjects\dni;
use yangpimpollo\L2_application\DTOs\OrderDto;
use Illuminate\Support\Str;
use Exception;

class StoreOrderUseCase
{
    public function __construct(
        private readonly OrderRepositoryInterface $repository,
        private readonly ProductRepositoryInterface $productRepository
    ) {}

    public function execute(OrderDto $dto): array
    {
        $orderId = 'ORD-' . strtoupper(Str::random(8));

        $order = new Order(
            $orderId,
            new dni($dto->customerDni),
            $dto->storeId,
            $dto->staffId
        );

        foreach ($dto->items as $itemDto) {
            
            $product = $this->productRepository->show($itemDto->productId, $dto->storeId);

            if (!$product) {
                throw my_product_Exception::empty_product($itemDto->productId);
            }

            if ($product->stock < $itemDto->quantity) {
                throw my_order_Exception::insufficient_stock(
                    $itemDto->productId, 
                    $product->stock, 
                    $itemDto->quantity
                );
            }

            $order->addItem(new OrderItem(
                $itemDto->productId,
                $itemDto->quantity,
                (float) $product->product_price, // Precio oficial de la DB
                $itemDto->discount
            ));
        }

        // 4. Guardamos la orden completa
        $this->repository->store($order);
    }
}