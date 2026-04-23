<?php

namespace yangpimpollo\L1_domain\Repository;

interface AuthRepositoryInterface
{
    public function login(string $username, string $password): string;
    public function logout(): bool;
}

