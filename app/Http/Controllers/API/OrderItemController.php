<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderItem\UpdateOrderItemRequest;
use App\Http\Requests\OrderItem\CreateOrderItemRequest;
use App\Http\Resources\OrderItem\OrderItemResource;
use App\Models\OrderItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderItemController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $orderItems = OrderItem::useFilters()->dynamicPaginate();

        return OrderItemResource::collection($orderItems);
    }

    public function store(CreateOrderItemRequest $request): JsonResponse
    {
        $orderItem = OrderItem::create($request->validated());

        return $this->responseCreated('OrderItem created successfully', new OrderItemResource($orderItem));
    }

    public function show(OrderItem $orderItem): JsonResponse
    {
        return $this->responseSuccess(null, new OrderItemResource($orderItem));
    }

    public function update(UpdateOrderItemRequest $request, OrderItem $orderItem): JsonResponse
    {
        $orderItem->update($request->validated());

        return $this->responseSuccess('OrderItem updated Successfully', new OrderItemResource($orderItem));
    }

    public function destroy(OrderItem $orderItem): JsonResponse
    {
        $orderItem->delete();

        return $this->responseDeleted();
    }

   
}
