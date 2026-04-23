<?php

namespace yangpimpollo\L3_infrastructure\Controllers\Auth;

use Illuminate\Http\Request;


use yangpimpollo\L2_application\DTOs\LoginDto;
use yangpimpollo\L2_application\UseCases\Auth\LoginUseCase;
use yangpimpollo\L3_infrastructure\Traits\ApiResponse;


class LoginController
{
    use ApiResponse;
    public function __construct( private LoginUseCase $LoginUseCase ) {}

    /**
     * Login
     */
    public function __invoke(Request $request)
    {
        $request->validate([ 
            'username' => 'required|string', 
            'password' => 'required|string'
        ]);

        $dto = new LoginDto( $request->input('username'), $request->input('password') );

        $data = [
            'token' => $this->LoginUseCase->execute($dto),
            'token_type' => 'Bearer',
        ];

        return $this->success($data, 'Login exitoso!!! . . .', 200);
    }
}