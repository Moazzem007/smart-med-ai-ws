<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {

    }

    public function index(): AnonymousResourceCollection
    {
        $orders = Order::where('user_id', Auth::user()->id)->with('orderItems')->useFilters()->dynamicPaginate();

        return OrderResource::collection($orders);
    }


    public function getOrdersByDate(Request $request): AnonymousResourceCollection
    {
        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();

        $orders = Order::where('user_id', Auth::user()->id)->whereBetween('created_at', [$startDate, $endDate])->with('orderItems')->useFilters()->dynamicPaginate();

        return OrderResource::collection($orders);
    }

    public function store(CreateOrderRequest $request): JsonResponse
    {
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'order_no' => 'ORD-' . date('YmdHis'),
            'status' => 'pending_payment',
            'subtotal' => $request->subtotal,
            'discount' => $request->discount,
            'tax' => $request->tax,
            'grand_total' => $request->grand_total,
            'payment_status' => $request->payment_status,
        ]);

        foreach($request->order_items as $orderItem){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $orderItem['product_id'],
                'product_type' => $orderItem['product_type'],
                'product_name' => $orderItem['product_name'],
                'unit_price' => $orderItem['unit_price'],
                'quantity' => $orderItem['quantity'],
                'line_total' => $orderItem['line_total'],
            ]);
        }

        return $this->responseCreated('Order created successfully', new OrderResource($order));
    }

    public function show(Order $order): JsonResponse
    {
        return $this->responseSuccess(null, new OrderResource($order));
    }

    public function update(UpdateOrderRequest $request, Order $order): JsonResponse
    {
        $order->update($request->validated());

        return $this->responseSuccess('Order updated Successfully', new OrderResource($order));
    }

    public function destroy(Order $order): JsonResponse
    {
        $order->delete();

        return $this->responseDeleted();
    }

    public function getCustomerOrderInfo(): JsonResponse
    {
        $totalOrders = Order::where('user_id', Auth::user()->id)->count();
        $completedOrders = Order::where('user_id', Auth::user()->id)->where('status', 'completed')->count();
        $pendingOrders = Order::where('user_id', Auth::user()->id)->where('status', 'pending_payment')->count();
        
        return $this->responseSuccess('Customer order info', [
            'total_orders' => $totalOrders,
            'completed_orders' => $completedOrders,
            'pending_orders' => $pendingOrders,
        ]);
    }

    public function getCustomerOrderInfoByDate(Request $request): JsonResponse
    {
        // Convert dates to start and end of day for proper datetime comparison
        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();
        
        $totalOrders = Order::where('user_id', Auth::user()->id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
            
        $completedOrders = Order::where('user_id', Auth::user()->id)
            ->where('status', 'completed')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
            
        $pendingOrders = Order::where('user_id', Auth::user()->id)
            ->where('status', 'pending_payment')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->count();
        
        return $this->responseSuccess('Customer order info', [
            'total_orders' => $totalOrders,
            'completed_orders' => $completedOrders,
            'pending_orders' => $pendingOrders,
        ]);
    }

   
}
