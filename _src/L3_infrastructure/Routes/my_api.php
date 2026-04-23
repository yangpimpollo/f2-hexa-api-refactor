<?php


use Illuminate\Support\Facades\Route;


use yangpimpollo\L3_infrastructure\Controllers\HelloWorldController;
use yangpimpollo\L3_infrastructure\Controllers\Auth\LoginController;
use yangpimpollo\L3_infrastructure\Controllers\Auth\LogoutController;
use yangpimpollo\L3_infrastructure\Controllers\Customer\ShowCustomerController;
use yangpimpollo\L3_infrastructure\Controllers\Customer\StoreCustomerController;



Route::get('/hello', HelloWorldController::class);

Route::prefix('auth')->group(function () {
    Route::post('/login', LoginController::class);
    Route::post('/logout', logoutController::class)->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('client')->group(function () {
        Route::get('/search-customer/{id}', [ShowCustomerController::class, 'show']);
        Route::post('/store-customer', [StoreCustomerController::class, 'store']);
    });



});













use Illuminate\Support\Facades\Hash;
use yangpimpollo\L3_infrastructure\Model\my_user;

Route::get('/test', function () {

    $password = 'mi-secreto-123';
    $hashedPassword = Hash::make("null");

    $var = Hash::check('mi-secreto-123', $hashedPassword);

    return $var;

});