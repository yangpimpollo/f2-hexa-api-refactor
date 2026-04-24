<?php

namespace yangpimpollo\L3_infrastructure\Persistence\Order;

use yangpimpollo\L1_domain\Entity\Order;
use yangpimpollo\L1_domain\Repository\OrderRepositoryInterface;


class EloquentOrder implements OrderRepositoryInterface
{

    public function __construct(
        private DeleteOrder $deleteOrder,
        private IndexOrder $indexOrder,
        private ShowOrder $showOrder,
        private StoreOrder $storeOrder,
    ) {}

    public function index(string $storeId): array
    {
        //return $this->showOrder->execute($id);
        return null;
    }

    public function store(Order $order): array
    {
        return $this->StoreOrder->execute($order);
    }

    public function show(string $orderId): ?Order
    {
        //return $this->storeOrder->execute($order);
        return null;
    }

    public function delete(string $orderId): array
    {
        //return $this->deleteOrder->execute($id);
        return null;
    }








}