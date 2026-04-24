<?php

namespace yangpimpollo\L1_domain\Entity;

class OrderItem
{
    public function __construct(
        private readonly string $productId,
        private readonly int $quantity = 1,
        private readonly float $listPrice = 0,
        private readonly float $discount = 0
    ) {}

    public function getProductId(): string { return $this->productId; }
    public function getQuantity(): int { return $this->quantity; }
    public function getListPrice(): float { return $this->listPrice; }
    public function getDiscount(): float { return $this->discount; }

    public function getSubtotal(): float 
    {
        return ($this->listPrice * $this->quantity) * (1 - $this->discount);
    }
}