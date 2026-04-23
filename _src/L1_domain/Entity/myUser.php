<?php

namespace yangpimpollo\L1_domain\Entity;

class myUser
{
    public function __construct(
        private readonly int $id,
        private string $username,
        private string $email,
        private string $password,
        private string $store_id,
    ) {}

    public function getId(): int { return $this->id; }
    public function getUsername(): string { return $this->username; }
    public function getEmail(): string { return $this->email; }
    public function getPassword(): string {  return $this->password; }
    public function getStoreId(): string { return $this->store_id; }
}