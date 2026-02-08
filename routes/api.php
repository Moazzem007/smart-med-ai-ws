<?php

use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\Featured_medicineController;
use App\Http\Controllers\API\MedicineController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\PromotionalBannerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\RolePermission\PermissionController;
use App\Http\Controllers\RolePermission\RoleController;
use App\Http\Controllers\Test\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/test', [TestController::class, 'returnAllUsers']);



Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


// admin routes
Route::middleware(['auth:api', 'permission:all_permission'])->group(function () {
    Route::apiResource('users', UserController::class);
    Route::post('users/{user}/assign-role', [UserController::class, 'assignRole']);
    Route::post('roles/{role}/assign-permission', [RoleController::class, 'assignPermission']);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('permissions', PermissionController::class);
});

// Regular user routes
Route::middleware(['auth:api', 'permission:user_permission'])->group(function () {
Route::post('/add-to-cart', [CartController::class, 'addToCart']);
Route::get('/get-cart-items', [CartController::class, 'getCartItems']);
Route::get('/delete-from-cart/{productId}', [CartController::class, 'deleteFromCart']);




/*===========================
=           orders           =
=============================*/

Route::apiResource('orders', OrderController::class);
Route::post('/get-orders-by-date', [OrderController::class, 'getOrdersByDate']);

Route::get('/customer-order-info', [OrderController::class, 'getCustomerOrderInfo']);
Route::post('/get-customer-order-info-by-date', [OrderController::class, 'getCustomerOrderInfoByDate']);

/*=====  End of orders   ======*/

});



/*===========================
=           customers           =
=============================*/
// Note: This is a test api route
Route::apiResource('/customers', \App\Http\Controllers\API\CustomerController::class);

/*=====  End of customers   ======*/

/*===========================
=           medicines           =
=============================*/

Route::apiResource('/medicines', \App\Http\Controllers\API\MedicineController::class);

/*=====  End of medicines   ======*/
Route::get('/import-medicines', [MedicineController::class, 'importMedicines']);

/*===========================
=           promotional_banners           =
=============================*/

Route::apiResource('/promotional_banners', PromotionalBannerController::class);

/*=====  End of promotional_banners   ======*/

/*===========================
=           featured_medicines           =
=============================*/

Route::apiResource('/featured_medicines', \App\Http\Controllers\API\Featured_medicineController::class);

/*=====  End of featured_medicines   ======*/


Route::get('/featured-medicine-list', [Featured_medicineController::class, 'featuredMedicineList']);


/*===========================
=           carts           =
=============================*/

Route::apiResource('/carts', \App\Http\Controllers\API\CartController::class);

/*=====  End of carts   ======*/

/*===========================
=           cartItems           =
=============================*/

Route::apiResource('/cartItems', \App\Http\Controllers\API\CartItemController::class);

/*=====  End of cartItems   ======*/

/*===========================
=           appInfos           =
=============================*/

Route::apiResource('/appInfos', \App\Http\Controllers\API\AppInfoController::class);

/*=====  End of appInfos   ======*/

/*===========================
=           bloodBanks           =
=============================*/

Route::apiResource('/bloodBanks', \App\Http\Controllers\API\BloodBankController::class);

Route::post('/sync-blood-banks', [\App\Http\Controllers\API\BloodBankController::class, 'syncBloodBanks']);

/*=====  End of bloodBanks   ======*/
