<?php

namespace yangpimpollo\L1_domain\Repository;

interface ProductRepositoryInterface
{
    public function index(string $query, string $storeId): array;
    public function show(string $productId, string $storeId): ?object;
}