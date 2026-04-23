<?php

namespace yangpimpollo\L3_infrastructure\Persistence;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


use yangpimpollo\L1_domain\Repository\AuthRepositoryInterface;
use yangpimpollo\L3_infrastructure\Model\my_user;

class EloquentAuth implements AuthRepositoryInterface
{
    public function login(string $username, string $password): string
    {
        $user = my_user::where('username', $username)->first();
        if (!$user) return "code - null";

        $check = Hash::check($password, $user->password);
        if(!$check) return "code - incorrect";

        $user->tokens()->delete();                                // quitar los tokens anteriores
        return $user->createToken('auth_token')->plainTextToken;
    }

    public function logout(): bool
    {
        // el midleware se asegura que exista una sesion
        $user = auth()->user();
        $user->currentAccessToken()->delete();

        return true;
    }
}
