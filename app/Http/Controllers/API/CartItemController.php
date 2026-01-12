<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartItem\UpdateCartItemRequest;
use App\Http\Requests\CartItem\CreateCartItemRequest;
use App\Http\Resources\CartItem\CartItemResource;
use App\Models\CartItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CartItemController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $cartItems = CartItem::useFilters()->dynamicPaginate();

        return CartItemResource::collection($cartItems);
    }

    public function store(CreateCartItemRequest $request): JsonResponse
    {
        $cartItem = CartItem::create($request->validated());

        return $this->responseCreated('CartItem created successfully', new CartItemResource($cartItem));
    }

    public function show(CartItem $cartItem): JsonResponse
    {
        return $this->responseSuccess(null, new CartItemResource($cartItem));
    }

    public function update(UpdateCartItemRequest $request, CartItem $cartItem): JsonResponse
    {
        $cartItem->update($request->validated());

        return $this->responseSuccess('CartItem updated Successfully', new CartItemResource($cartItem));
    }

    public function destroy(CartItem $cartItem): JsonResponse
    {
        $cartItem->delete();

        return $this->responseDeleted();
    }

   
}
