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

    public function show($id)
    {
        return $this->showOrder->execute($id);
    }

    public function index(string $storeId): array
    {
        return $this->indexOrder->execute($storeId);
    }

    public function store(Order $order)
    {
        return $this->storeOrder->execute($order);
    }

    public function delete($id)
    {
        return $this->deleteOrder->execute($id);
    }








}